<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reader.return-book') }}" method="POST" id="return-book-form">
                @CSRF
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group row">
                        <label for="count-book" class="col-sm-2 col-form-label">Count</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="count-book" name="count">
                            <input type="hidden" id="return-book-book" name="book">
                            <input type="hidden" id="return-book-user" name="user">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Return book</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
