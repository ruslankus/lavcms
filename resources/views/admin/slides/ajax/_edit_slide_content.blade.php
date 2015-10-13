<input type="hidden" name="slide-id" id="slide-id" value="{{ $slideId }}">
<input type="hidden" name="current-lng-id" id="currrent-lng-id" value="{{$slideContent->lng_id}}" >
<div class="form-group">
    <label class="control-label">caption Text</label>
                        <textarea class="form-control" name="text-area" id="text-area">
                            <?=(!empty($slideContent->slide_html))? $slideContent->slide_html :''; ?>
                        </textarea>
</div>

<div class="form-group">
    <label class="control-label">alt text</label>
    <input class="form-control" name="alt" type="text"
           value="<?=(!empty($slideContent->slide_alt))? $slideContent->slide_alt :''; ?>" >

</div>

<div class="clearfix">
    <button type="submit" id="save-content" class="btn btn-default">Save slide</button>
</div>