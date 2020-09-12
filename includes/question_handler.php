<?php require_once('initialize.php'); ?>

<?php 

if(isset($_POST['add'])){
    
    
    if(($_POST['sid'] == '')){
        $session->message('Question not created!');
        redirect_to('../index.php');
    }

    if(($_POST['question'] == '') || ($_POST['answer'] == '')){
        $session->message('Both question and answer must be filled!');
        redirect_to('../company/question_paper.php?id='.$_POST['sid']);
    }

    if( ($_POST['answer'] == 'a' && $_POST['a'] == '') || ($_POST['answer'] == 'b' && $_POST['b'] == '') ||
        ($_POST['answer'] == 'c' && $_POST['c'] == '') || ($_POST['answer'] == 'd' && $_POST['d'] == '') ){
            $session->message('Chosen answer must be filled!');
            redirect_to('../company/question_paper.php?id='.$_POST['sid']);
    }

    
    
    $id = Question::get_max_id() + 1;
    $question = new Question();
    $question->id = $id;
    $question->sid = $_POST['sid'];
    $question->question = $_POST['question'];
    $question->answer = $_POST['answer'];
    $question->a = $_POST['a'];
    $question->b = $_POST['b'];
    $question->c = $_POST['c'];
    $question->d = $_POST['d'];

    if($question->a == ''){
        $question->a = ' ';
    }
    if($question->b == ''){
        $question->b = ' ';
    }
    if($question->c == ''){
        $question->c = ' ';
    }
    if($question->d == ''){
        $question->d = ' ';
    }

    

    if($question->create()){
        $session->message('Question created!');
        redirect_to('../company/question_paper.php?id='.$question->sid);
    } else {
        $session->message('Question was not created!');
        redirect_to('../company/question_paper.php?id='.$question->sid); 
    }

} elseif(isset($_POST['delete'])){
    
    
    if($_POST['delete'] != ''){
        $question = Question::find_by_id($_POST['delete']);
        if($question->delete()){
            $session->message('Removed');
            redirect_to('../company/question_paper.php?id='.$question->sid);   
        } else {
            $session->message('Operation failed');
            redirect_to('../company/question_paper.php\?id='.$question->sid); 
        }
    } else {
        redirect_to('../company/question_paper.php?id='.$question->sid); 
    }
} else {
    redirect_to('../company/index.php');
}

?>