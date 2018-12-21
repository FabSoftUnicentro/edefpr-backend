{!! form_start($form) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informações do Atendimento</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->assisted_id) !!}
                    {!! form_widget($form->assisted_id) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->type_id) !!}
                    {!! form_widget($form->type_id) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->description) !!}
                    {!! form_widget($form->description) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    {!! form_widget($form->submit) !!}
</div>
{!! form_end($form) !!}
