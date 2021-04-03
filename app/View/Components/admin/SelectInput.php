<?php

namespace App\View\Components\admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class SelectInput extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $label;

    /**
     * @var array|Collection
     */
    public $options;

    /**
     * @var string
     */
    public $value;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $input_class;

    /**
     * @var bool
     */
    public $required;

    /**
     * @var boolean
     */
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param $options
     * @param string|null $value
     * @param string|null $type
     * @param string|null $placeholder
     * @param null|string $id
     * @param null|string $input_class
     * @param bool $required
     * @param bool $disabled
     */
    public function __construct(string $name, string $label,
                                $options, ?string $value, $type='text',
                                $placeholder='Please Fill The Form',
                                $id=null, $input_class=null,
                                $required=true, $disabled=false)
    {
        $this->name = $name;

        $this->label = $label;

        $this->options = $options;

        $this->value = $value;

        $this->type = $type;

        $this->placeholder = $placeholder;

        if($id == null)
        {
            $this->id = Str::random();
        }

        $this->input_class = $input_class;

        $this->required = $required;

        $this->disabled = $disabled;
    }

    /**
     * Return give options was selected or not
     *
     * @param $option
     * @return string
     */
    public function is_selected($option): string
    {
        if($option == null && $this->value == '')
            return 'selected';
        if($option == $this->value)
            return 'selected';
        return '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.select-input');
    }
}
