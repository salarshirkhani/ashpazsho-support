<tr>
    <td><input type="text" class="form-control w-100" name="visits[{{ !empty($tag) ? $idx : 'IDX' }}][visit_date]" value="{{ !empty($visit_date) ? $visit_date : (!empty($tag) ? $tag->visit_date : '' )}}" placeholder="باید به صورت 9999/99/9 وارد شود"> </td>
    <td><input type="text" class="form-control w-100" name="visits[{{ !empty($tag) ? $idx : 'IDX' }}][description]" value="{{ !empty($description) ? $description : (!empty($tag) ? $tag->description : '' )}}" placeholder="شرح حال مریض اینجا نوشته شود"></td>
    <td><input type="text" class="form-control w-100" name="visits[{{ !empty($tag) ? $idx : 'IDX' }}][procedure]" value="{{ !empty($procedure) ? $procedure : (!empty($tag) ? $tag->procedure : '' )}}" placeholder="اقدامات درمانی اینجا گفته شود"></td>
    <td><input type="text" class="form-control w-100" name="visits[{{ !empty($tag) ? $idx : 'IDX' }}][percentage]" value="{{ !empty($percentage) ? $percentage : (!empty($tag) ? $tag->percentage : '' )}}" placeholder="خوب بودن بیمار بر اساس 0-100"></td>
    <td><button type="button" class="btn btn-xs btn-danger btn-remove-tag"><i class="fa fa-times"></i></button></td>
</tr>
