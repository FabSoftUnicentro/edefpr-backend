{!! form_start($form) !!}

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Situação Habitacional</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->residence_kind) !!}
                    {!! form_widget($form->residence_kind) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->residence_situation) !!}
                    {!! form_widget($form->residence_situation) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->rental_value) !!}
                    {!! form_widget($form->rental_value) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! form_widget($form->submit) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}
