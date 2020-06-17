class CommentManager extends DBConnect
{   
    public function getComments($postId)
    {
        $db = $this->connect();
        $comments = $db->prepare('SELECT id, author, comment, commentDate FROM comments WHERE postId = ? ORDER BY commentDate DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->connect();
        $comments = $db->prepare('INSERT INTO comments(postId, author, comment, commentDate) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function report($id)
    {
        $db = $this->connect();
        $report = $db->prepare("UPDATE comments SET report = 1 WHERE postId = ?");
        $report->execute(array($id));

    }
}

 