{!! form_start($form) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Petições</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->files) !!}
                    {!! form_widget($form->files) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    {!! form_widget($form->submit) !!}
</div>
{!! form_end($form) !!}
