{!! form_start($form) !!}

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Informações Gerais</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->social_programs) !!}
                    {!! form_widget($form->social_programs) !!}
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->social_security_contribution) !!}
                    {!! form_widget($form->social_security_contribution) !!}
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->income_tax) !!}
                    {!! form_widget($form->income_tax) !!}
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->alimony) !!}
                    {!! form_widget($form->alimony) !!}
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->extraordinary_expenses) !!}
                    {!! form_widget($form->extraordinary_expenses) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! form_widget($form->submit) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}
