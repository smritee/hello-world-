<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        jQuery("#receiver_id").autocomplete("<?php echo url::site() . '/user/user_transfer' ?>"); 
    });
    $(document).ready(function(){
        $("#selectAll").click(function(){
            $("input[type=checkbox]").attr('checked','checked');
        }); 
    });
</script>

<?php echo $pagination ?>
<?php if ($pincodes): ?>
    <?php echo form::open() ?>
    <?php echo $__form_object ?>
    <table cellspacing="0" cellpadding="0" class="table">
        <thead align="left" valign="middle">
            <tr>
                <td><input type="checkbox" id="selectAll" /></td>
                <td>SL</td>
                <td>PIN</td>
                <td>Amount(&pound;)</td>
                <td>Date of Buy</td>
            </tr>
        </thead>
        <tbody align="left" valign="middle">
            <?php $sl = 1; ?>
            <?php foreach ($pincodes as $pincode): ?>
                <tr <?php echo (($sl % 2) == 1) ? 'class="even"' : ''; ?>>
                    <td><input type="checkbox" name="pincodes[]" value="<?php echo $pincode->id ?>" /></td>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $pincode->pin_part1 . $pincode->pin_part2 ?></td>
                    <td><?php echo $pincode->amount; ?></td>
                    <td><?php echo $pincode->sellDate ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="form" >
        <table class="table">
            <tr class="even">
                <td><?php echo form::label($receiver_id->name, $receiver_id->label) ?></td>
                <td>
                    <?php echo empty($receiver_id->error) ? form::input($receiver_id->name, $receiver_id->value) : form::input($receiver_id->name, $receiver_id->value, 'class="error"') ?>
                    <?php if (!empty($receiver_id->error)): ?><br /><span class="error"><?php echo $receiver_id->error ?></span><?php endif ?>
                </td>
            </tr>
            <tr>
                <td><?php echo form::label($current_password->name, $current_password->label) ?></td>
                <td>
                    <?php echo empty($current_password->error) ? form::password($current_password->name, $current_password->value) : form::password($current_password->name, $current_password->value, 'class="error"') ?>
                    <?php if (!empty($current_password->error)): ?><br /><span class="error"><?php echo $current_password->error ?></span><?php endif ?>          
                </td>
            </tr>
            <tr class="even">
                <td></td>
                <td>
                    <?php echo form::submit($submit->name, $submit->label) ?>
                </td>
            </tr>
        </table>
    </div>
    <?php echo form::close() ?>
<?php endif ?>
<?php echo $pagination ?>
