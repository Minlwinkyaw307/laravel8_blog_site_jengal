<?php

namespace App\View\Components\admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class TextInput extends Component
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
    public $textarea;

    /**
     * @var int
     */
    public $rows;

    /**
     * @var int
     */
    public $cols;

    /**
     * @var bool
     */
    public $required;


    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string|null $value
     * @param string|null $type
     * @param string|null $placeholder
     * @param null|string $id
     * @param null|string $input_class
     * @param bool $textarea
     * @param int $cols
     * @param int $rows
     * @param bool $required
     */
    public function __construct(string $name, string $label,
                                ?string $value, $type = 'text',
                                $placeholder = 'Please Fill The Form',
                                $id = null, $input_class = null,
                                $textarea = false, $cols=3, $rows=5,
                                $required=true)
    {
        $this->name = $name;

        $this->label = $label;

        $this->value = $value;

        $this->type = $type;

        $this->placeholder = $placeholder;

        if ($id == null) {
            $this->id = Str::random();
        }

        $this->input_class = $input_class;

        $this->textarea = $textarea;

        $this->rows = $rows;

        $this->cols = $cols;

        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.text-input');
    }
}
