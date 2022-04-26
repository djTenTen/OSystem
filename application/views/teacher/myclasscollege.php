<div class="main">
<h1>College Class</h1>
<br>
<br>

<div class="container">
    <?php foreach($collegeclass as $row){?>
        <div class="media border p-3">
            <div class="media-body">
                <a href="collegeclasslist/<?= $row['curriculumID'];?>/<?= $row['subjectID'];?>"><h4><?= $row['subjectDesc'];?><small> <i> <?= $row['Day'];?> / <?= $row['Time'];?></i></small></h4></a>
                <h6><?= $row['CourseDesc'].' - '.$row['Section'] ;?></h6>
            </div>
        </div>
    <?php }?>
</div>


















</div>