<?php

namespace App\Model\Repository;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException,
    Symfony\Component\Security\Core\Exception\UnsupportedUserException,
    Symfony\Component\Security\Core\User\UserProviderInterface,
    Symfony\Component\Security\Core\User\UserInterface,
    Doctrine\ORM\NoResultException,
    Doctrine\ORM\EntityRepository,
    App\Model\Entity\User;

/**
 * Class UserRepository
 *
 * @package App\Model\Repository
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
    /**
     * Used automatically from the silex login process
     *
     * @param string $username
     *
     * @return User|UserInterface
     *
     * @throws UsernameNotFoundException
     */
    public function loadUserByUsername($username)
    {
        $q = $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery();

        try
        {
            $user = $q->getSingleResult();
        }
        catch (NoResultException $e)
        {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return new User($user->getId(), $user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getToken(), explode(',', $user->getRoles()), $user->isEnabled(), true, true, true);
    }

    /**
     * Used automatically from the silex login process
     *
     * @param $id
     *
     * @return null|object
     */
    public function loadUserById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

    /**
     * Eagerly load a user (mainly for the user's token)
     *
     * This is here so the websocket event handler can use it to get the user's token. However, Doctrine lazy
     * loads by default - hence repeated requests for the token will return a 'cached' version. An eager load of the
     * user's unique token from the database is required.
     *
     * @param int $userId
     *
     * @return User|false
     */
    public function eagerLoadTokenAgainstUserId($userId)
    {
        $q = $this->createQueryBuilder('u')
                  ->where('u.id = :userId')
                  ->setParameter('userId', $userId)
                  ->getQuery()
                  ->setFetchMode('User', 'users', 'EAGER');

        return $q->getSingleResult();
    }

    /**
     * A random user token is generated and set in the database on each request (useful for websocket requests)
     *
     * @param UserInterface $user
     *
     * @return User|UserInterface
     *
     * @throws UnsupportedUserException
     */
    public function refreshUser(UserInterface $user)
    {
        if ($user instanceof User)
        {
            $em = $this->getEntityManager();
            $user = $this->find($user->getId());
            $user->generateNewToken();
            $em->persist($user);
            $em->flush();

            return $this->loadUserByUsername($user->getEmail());
        }
        else
        {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
    }

    /**
     * Allow the websocket call access to this to refresh the User object to get the actual (non-cached) token from db
     *
     * @param User $user
     */
    public function refreshWebsocketTokenDoctrineCacheForUser(User $user)
    {
        $this->getEntityManager()->refresh($user);
    }

    /**
     * Used automatically by silex
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }
}
