<form action="{{url('/adm/ex/que/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="createQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
              <h5 class="modal-title" id="exampleModalLabel">Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea id="summernote" name="question" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label for="answer1" class="col-sm-2 col-form-label">Answer 1</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="answer1" name="answer[]" placeholder="Answer" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="answer2" class="col-sm-2 col-form-label">Answer 2</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="answer2" name="answer[]" placeholder="Answer" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="answer3" class="col-sm-2 col-form-label">Answer 3</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="answer3" name="answer[]" placeholder="Answer" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="answer4" class="col-sm-2 col-form-label">Answer 4</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="answer4" name="answer[]" placeholder="Answer" required autocomplete="off">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-4 pt-0 text-right">Correct</legend>
                              <div class="col-sm-8">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="correct" id="gridRadios1" value="1" checked>
                                  <label class="form-check-label" for="gridRadios1">
                                    1
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="correct" id="gridRadios2" value="2">
                                  <label class="form-check-label" for="gridRadios2">
                                    2
                                  </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correct" id="gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">
                                      3
                                    </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="correct" id="gridRadios4" value="4">
                                  <label class="form-check-label" for="gridRadios4">
                                    4
                                  </label>
                              </div>
                              </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="co_course_id" id="co_course_id" value="{{$paper->course->id}}">
              <input type="hidden" name="paper_id" id="paper_id" value="{{$paper->id}}">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
</form>
