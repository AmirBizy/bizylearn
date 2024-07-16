<?php

namespace Aloko\PersianDatepicker;

use Laravel\Nova\Fields\Field;
use Exception;
use DateTimeInterface;

class PersianDateTime extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'persian-date-time';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value) {
            if (! $value instanceof DateTimeInterface) {
                throw new Exception("DateTime field must cast to 'datetime' in Eloquent model.");
            }

            return $value->format('Y-m-d H:i:s');
        });
    }

    /**
     * Set the date format based on Babakhani persianDate library date formats
     *
     * @param  string  $format
     * @return $this
     */
    public function format($format)
    {
        return $this->withMeta(['format' => $format]);
    }

    
    /**
     * Indicate that the date field is nullable.
     *
     * @return $this
     */
    public function nullable()
    {
        return $this->withMeta(['nullable' => true]);
    }
}
