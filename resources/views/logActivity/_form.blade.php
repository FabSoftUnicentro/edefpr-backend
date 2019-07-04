{!! form_start($form) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->user_id) !!}
                    {!! form_widget($form->user_id) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->dateInitial) !!}
                    {!! form_widget($form->dateInitial) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->dateFinal) !!}
                    {!! form_widget($form->dateFinal) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->hourInitial) !!}
                    {!! form_widget($form->hourInitial) !!}
                </div>
                <div class="form-group">
                    {!! form_label($form->hourFinal) !!}
                    {!! form_widget($form->hourFinal) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    {!! form_widget($form->submit) !!}
</div>
{!! form_end($form) !!}
