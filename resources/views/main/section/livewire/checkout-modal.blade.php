<!-- Modal -->
<div wire:ignore class="modal fade" id="calendar-modal" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="calendar-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calendar-modal-label">Select date</h5>
                <span class="btn-close cursor-pointer" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>

            </div>
            <div class="modal-body p-0">
                {{
                    html()
                    ->hidden('selected-date')
                    ->required()
                    ->placeholder('')
                    ->attributes(['id'=>'selected-date','class'=>'form-control date-time-picker','wire:model.live'=>'selectedDate'])
                    }}

                <div id="calendar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close btn-global mb-2">OK</button>
            </div>
        </div>
    </div>
</div>
@script
<script>
    let calendar;

    $(document).ready(function () {
        $(".btn-close").on('click', () => calendarModal.modal('hide'));

        calendarModal.on('shown.bs.modal', () => {
            calendar = new Calendar('#calendar', {
                defaultDate: '{{ $selectedDate }}',
                blockedDates:  @json($blockedDate),
                startWeekOn: 'saturday',
                timezone: 'America/New_York',
                onDateSelect: params => {
                    const input = document.getElementById('selected-date');
                    input.value = params.date
                    input.dispatchEvent(new Event('input'));
                },
            });
        }).on('hidden.bs.modal', () => {

        });
    });
</script>
@endscript
