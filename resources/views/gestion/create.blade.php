@extends('layouts.dashboard')
@section('contenido')

<div class="row">
    
    <a href="http://www.wiris.com/plugins/demo/ckeditor/php" title="PHP"><input type= "hidden" id="php_logo" class="wrs_tech_logo"  alt="PHP"></a>
    <h3>Nueva Categoría</h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
 
    <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                  <h4 class="card-title">Form Elements</h4>
                </div>
              </div>
              <div class="card-body ">

                    {!!Form::open(array('url'=>'gestion','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                
                    <label for= "contenido"> Contenido</label>
                    <textarea name= "contenido" id="example" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
                        <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.</p>
                        <p style="text-align: center;"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#x000B1;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>
                        <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
                        <p style="text-align: center;"><math class="wrs_chemistry" xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#x21CC;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>
                        <br>
                        <p>The entire formula for the surface area of a cylinder is <math xmlns="http://www.w3.org/1998/Math/MathML"><mn>2</mn><msup><mi>&#x3C0;r</mi><mn>2</mn></msup><mo>+</mo><mn>2</mn><mi>&#x3C0;rh</mi></math></p>
                    </textarea>
                    <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                    {!!Form::close()!!}
              </div>
            </div>
          </div>


    
            
   
          <div class="container text-center">
                <button id="previewButton" class="btn btn-info" onclick="updateFunction()" >Actualizar</button>
            </div>

        <div class="wrs_row wrs_padding">
            <div class="wrs_col wrs_s12">
                <div id="container_tab">
                
                    <div id="content_tab">
                        <div class="wrs_div_box wrs_preview" id="preview_div"></div>
                        <div class="wrs_div_box wrs_preview wrs_code" id="htmlcode_div" style="display:none;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="options" style="direction: ltr;">

            <div class="wrs_row wrs_padding">
                
                <div class="wrs_col wrs_s12 wrs_m6">
                    <div class="wrs_row wrs_padding_small">
                        <div class="wrs_col wrs_xs1"><input type ="hidden" id="advanced_options_checkbox" onclick="advancedOptions()" /></div>
                        
                    </div>
                </div>
            </div>

            <div id="advanced_options" style="display:none">
            </div>
        </div>
    </div>
</div>
</div>


@endsection