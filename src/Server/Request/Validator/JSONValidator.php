<?php

namespace Server\Request\Validator;

/**
 * Class JSONValidator
 *
 * {@inheritdoc}
 *
 * @package Server\Request\Validator
 */
class JSONValidator implements ValidatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function validate($data)
    {
        if (is_string($data) && $data !== "")
        {
            $data = json_decode($data);

            if (!is_null($data) && json_last_error() === JSON_ERROR_NONE)
            {
                if (is_object($data))
                {
                    $data = get_object_vars($data);
                }

                if (is_array($data))
                {
                    return $data;
                }
            }
            else
            {
                return false;
            }
        }
        elseif (is_array($data))
        {
            /** Data is already valid and can be returned as such **/
            return $data;
        }
        elseif (is_object($data))
        {
            /** Data can be typecasted to an array **/
            return get_object_vars($data);
        }
        else
        {
            return false;
        }
    }
}