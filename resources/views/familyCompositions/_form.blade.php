{!! form_start($form) !!}

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Informações Pessoais</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->name) !!}
                    {!! form_widget($form->name) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->birth_date) !!}
                    {!! form_widget($form->birth_date) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->legal_situation) !!}
                    {!! form_widget($form->legal_situation) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->kinship) !!}
                    {!! form_widget($form->kinship) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->work) !!}
                    {!! form_widget($form->work) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->income) !!}
                    {!! form_widget($form->income) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->assisted_id) !!}
                    {!! form_widget($form->assisted_id) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! form_widget($form->submit) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}
