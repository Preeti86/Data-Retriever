<?php

function dataset_options_mb( $post ){

    $dataset_data               = get_post_meta( $post->ID, 'dataset_data', true);

    if( empty($dataset_data) ){
        $dataset_data               =   array(
                'groups'                =>  '',
                'organisations'         =>  '',
                'format'              =>  'JSON',
                'url'                   =>  '',

        );
    }
    ?>
<div class="form-group">
    <label>Groups</label>
    <input type="text" class="form-control" name="p_inputGroups" value="<?php echo $dataset_data['groups']; ?>">
</div>
<div class="form-group">
    <label>Organisations</label>
    <input type="text" class="form-control" name="p_inputOrganisations" value="<?php echo $dataset_data['organisations']; ?>">
</div>
<div class="form-group">
    <label>Types</label>
    <select class="form-control" name="p_inputformat">
        <option value= "json" <?php echo $dataset_data['datatype'] == "JSON" ? "SELECTED" : "";  ?>>JSON</option>
        <option value="xml" <?php echo $dataset_data['datatype'] == "XML" ? "SELECTED" : ""; ?>>XML</option>
        <option value="csv" <?php echo $dataset_data['datatype'] == "csv" ? "SELECTED" : ""; ?>>CSV</option>

    </select>
</div>
<div class="form-group">
    <label>URL</label>
    <input type="text" value="<?php echo $dataset_data[ 'url']; ?>"  class="form-control" name="p_inputUrl">
</div>

<?php
}