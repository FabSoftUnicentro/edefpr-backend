{!! form_start($form) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->activity) !!}
                    {!! form_widget($form->activity) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->date) !!}
                    {!! form_widget($form->date) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->hour) !!}
                    {!! form_widget($form->hour) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    {!! form_widget($form->submit) !!}
</div>
{!! form_end($form) !!}
