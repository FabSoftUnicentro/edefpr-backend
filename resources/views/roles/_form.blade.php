{!! form_start($form) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-centered flow-h">
            <div class="box-header with-border">
                <h3 class="box-title">Informações de nível de acesso</h3>
            </div>

            <div class="box-body" style="vertical-align: middle;">
                <div class="form-group">
                    {!! form_label($form->name) !!}
                    {!! form_widget($form->name) !!}
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
