
# Cupcode/Formbuilder  
This is an example ReadMe with light selections.  

## Installation  

~~~bash  
  composer require cupcode/formbuilder
  php artisan cupcode:formbuilder
~~~


Install dependencies  

~~~bash  
npm i @inertiajs/vue3 filepond filepond-plugin-image-preview filepond-plugin-file-poster  @mdi/font @vitejs/plugin-vue ziggy-js vuetify vite-plugin-vuetify @tailwindcss/forms @vitejs/plugin-vue

~~~

## Example
Laravel Controller
~~~PHP
use CupCode\FormBuilder\Components\FileUpload;
use CupCode\FormBuilder\Components\TextInput;
public function form() :Form{
        return Form::make()->schema([
            TextInput::make('name'),
            FileUpload::make('image')
        ]);
    }
    public function forms() :array{
        return [
            'form' => $this->form()
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Home', [
            'forms' => $this->forms()
        ]);
    }
~~~

Vue Page
~~~javasceipt
<template>
    <div>
    <Form :data="props.forms.form" />
    </div>
</template>

<script setup>
    import {Form, ModalForm} from 'cupcodeformbuilder'
    const props = defineProps(['forms']);
</script>
~~~

## Features  
- Text Field  
- Numric Field  
- Text Area
- Select
- File Upload 
- Radio Button
- Checkbox
- Group (for Design)
- Validation
- Chained method to set properties


## Usage/Examples  
~~~PHP  
use CupCode\FormBuilder\Components\FileUpload;
use CupCode\FormBuilder\Components\TextInput;
use CupCode\FormBuilder\Components\CheckboxInput;
use CupCode\FormBuilder\Components\Group;
use CupCode\FormBuilder\Components\RadioInput;
use CupCode\FormBuilder\Components\Select;
use CupCode\FormBuilder\Components\ToggleInput;

[Component]::make('name')
~~~  


## Contributing  

Contributions are always welcome!  


## License  

[MIT](https://choosealicense.com/licenses/mit/)


## Authors  
- [@Nashwan-Dlshad](https://github.com/Nashwan-Dlshad)  
