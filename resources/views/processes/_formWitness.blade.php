{!! form_start($form) !!}
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Informações Gerais</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->witnesses) !!}
                    {!! form_widget($form->witnesses) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! form_widget($form->submit) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}
