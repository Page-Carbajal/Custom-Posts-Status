<?php


namespace WPExpress\UI;


class FieldCollection implements \ArrayAccess, \Countable
{

    private $container;
    private $selectedFieldName;
    private $fieldTypes = array( 'hidden', 'text', 'textarea', 'checkbox', 'radiobutton', 'select' );


    public function __construct()
    {
        $this->container         = array();
        $this->selectedFieldName = false;
    }

    private function newField( $name, $type )
    {
        $field = new \stdClass();

        $field->ID         = strtolower($name);
        $field->name       = strtolower($name);
        $field->type       = $type;
        $field->value      = '';
        $field->attributes = array();
        $field->properties = array();

        return $field;
    }

    private function addField( $name, $type = null )
    {
        if( isset( $this->container[$name] ) ) {
            // Trigger a Warning
            trigger_error("A field named {$name} is already part of the list!", E_USER_WARNING);
        }
        // Validates the given type against our list
        $fieldType               = in_array($type, $this->fieldTypes) ? $type : 'text';
        $this->container[$name]  = $this->newField($name, $fieldType);
        $this->selectedFieldName = $name;
        return $this;
    }

    public function field( $name )
    {
        $this->selectedFieldName = isset( $this->container[$name] ) ? $name : false;
        return $this;
    }

    public function addHiddenInput( $name )
    {
        $this->addField($name, 'hidden');
        return $this;
    }

    public function addTextInput( $name )
    {
        $this->addField($name, 'text');
        return $this;
    }

    public function addTextArea( $name )
    {
        $this->addField($name, 'textarea');
        return $this;
    }

    public function addRadioButton( $name )
    {
        $this->addField($name, 'radiobutton');
        return $this;
    }

    public function addCheckBox( $name )
    {
        $this->addField($name, 'checkbox');
        return $this;
    }

    public function addSelect( $name, $options )
    {
        $this->addField($name, 'select');
        $this->setProperty('options', $options);
        return $this;
    }

    public function setID( $ID )
    {
        if( $this->selectedFieldName !== false ) {
            $this->container[$this->selectedFieldName]->ID = $ID;
        }
        return $this;
    }

    public function setAttribute( $att, $value )
    {
        if( $this->selectedFieldName !== false ) {
            $this->container[$this->selectedFieldName]->attributes[$att] = $value;
        }
        return $this;
    }

    public function setAttributes( $atts )
    {
        if( $this->selectedFieldName !== false ) {
            $this->container[$this->selectedFieldName]->attributes = $atts;
        }
        return $this;
    }

    private function setProperty( $property, $value )
    {
        if( $this->selectedFieldName !== false ) {
            $this->container[$this->selectedFieldName]->properties[$property] = $value;
        }
        return $this;
    }

    //Labels and related data
    public function addLabel( $text )
    {
        $this->setProperty('label', $text);
        return $this;
    }

    public function getValue()
    {
        return isset( $this->container[$this->selectedFieldName]->properties['value'] ) ? $this->container[$this->selectedFieldName]->properties['value'] : null;
    }

    public function setValue( $value )
    {
        $this->setProperty('value', $value);
        return $this;
    }


    /****ArrayField Methods****/


    /****Parse HTML****/
    public function parseFields()
    {
        $parser = new HTMLFieldParser($this->container);
        return $parser->parseFields();
    }

    public function toArray()
    {
        return $this->container;
    }

    /*****Contracts*****/
    /*****Implement Interface Methods*******/
    // ArrayAccess Methods
    public function offsetSet( $offset, $value )
    {
        if( !empty( $offset ) ) {
            //$this->fieldList[] = $value;
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists( $offset )
    {
        return isset( $this->container[$offset] );
    }

    public function offsetUnset( $offset )
    {
        unset( $this->container[$offset] );
    }

    public function offsetGet( $offset )
    {
        return isset( $this->container[$offset] ) ? $this->container[$offset] : null;
    }

    // Countable Methods
    public function count()
    {
        return count($this->container);
    }

}