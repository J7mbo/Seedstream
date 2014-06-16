<?php

namespace App\ServerArbiter;

use App\ServerArbiter\Rules\Rule;

/**
 * Class RuleSet
 *
 * @package App\ServerArbiter
 */
class RuleSet implements \Iterator, \Countable
{
    /**
     * @var Rule[] An array of Rule objects
     */
    private $rules;

    /**
     * @var int Iterator position key
     */
    private $position = 0;

    /**
     * Add a Rule to the RuleSet
     *
     * @param Rule $rule
     */
    public function addRule(Rule $rule)
    {
        if (!in_array($rule, $this->rules))
        {
            $this->rules[] = $rule;
        }
    }

    /**
     * Remove a Rule from the RuleSet by it's key
     *
     * @param int $ruleKey The numeric key within the rules array to unset
     *
     * @throws \OutOfBoundsException     When a non-existant key is provided
     * @throws \InvalidArgumentException When a non-integer parameter is provided
     */
    public function removeRule($ruleKey)
    {
        if (is_int($ruleKey))
        {
            if (array_key_exists($ruleKey, $this->rules))
            {
                unset($this->rules[$ruleKey]);
            }
            else
            {
                throw new \OutOfBoundsException(sprintf(
                    "%s was passed a out of bounds array key: %s does not exist in this ruleset", __METHOD__, $ruleKey
                ));
            }
        }
        else
        {
            throw new \InvalidArgumentException(sprintf(
                "%s expected an integer ruleKey parameter, got: '%s' instead", __METHOD__, $ruleKey
            ));
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return Rule
     */
    public function current()
    {
        return $this->rules[$this->position];
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->rules[$this->position]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->rules);
    }
}