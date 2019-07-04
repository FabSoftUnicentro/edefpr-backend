{!! form_start($form) !!}

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Informações dos Bens</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->name) !!}
                    {!! form_widget($form->name) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->price) !!}
                    {!! form_widget($form->price) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->status) !!}
                    {!! form_widget($form->status) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->installment_price) !!}
                    {!! form_widget($form->installment_price) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! form_widget($form->submit) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}
