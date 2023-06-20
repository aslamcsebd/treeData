
<tr>
    <?php
        if($parent->count() > 1){
            echo $pRow = $parent->count();
            echo $pRow = 3;
        }else{
            $pRow = 0;
        }
    ?>

    @foreach($parent as $parent2)
        <?php
            if($parent2->children->count() > 1){
                echo $pRow = $parent2->children->count() -1;
            }else{
                $pRow = $pRow;
            }
        ?>

        <x-child :child="$parent2" :pRow="$pRow" />
    @endforeach
</tr>
