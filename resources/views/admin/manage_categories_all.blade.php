@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Manage Category</div>
    <div class="col-xs-4 col-xs-offset-4 bar-cen">
        <a href="<?php echo URL::to('/insert-cake'); ?>"><button class="btn btn-primary">Insert new category</button></a>
    </div>
    <div class="col-xs-12 pad-menu">
        <?php 
        foreach ($categories as $key => $value) 
        {
            ?>
            <div class="col-xs-4 center">
                <table border="1" width="200">
                    <tr>
                        <th><?php echo $value['category_name']; ?></th>
                    </tr>
                    <tr>
                        <td><?php echo $value['category_flavor']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $value['category_origin']; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo URL::to('/manage-category/'.$value['category_id']); ?>"><button class="btn btn-primary">Manage category</button></a></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo URL::to('/delete-category/'.$value['category_id']); ?>"><button class="btn btn-primary">Delete category</button></a></td>
                    </tr>
                </table>
            </div>
            <?php   
        }
        ?>
    </div>
</div>

@endsection