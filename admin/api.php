<?php
require_once ("database.php");

function getCommentsChartData($post_id, $start = "", $end = "") {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "Select count(authorId) as counted_leads, DATE_FORMAT(datePublished, '%m/%d/%Y') as count_date from comments where postId=".$post_id." group by CAST(datePublished AS DATE)";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$chart_data = array();

		while($row = mysqli_fetch_assoc($result)) {
			$data = array(
				"date" => $row["count_date"],
				"count" => $row["counted_leads"]);
			array_push($chart_data, $data);
		}

		return $chart_data;
	} else {
		return array();
	}
}

function getLikesChartData($post_id, $start = "", $end = "") {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "Select count(authorId) as counted_leads, DATE_FORMAT(datePublished, '%m/%d/%Y') as count_date from likes where postId=".$post_id." group by CAST(datePublished AS DATE)";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$chart_data = array();

		while($row = mysqli_fetch_assoc($result)) {
			$data = array(
				"date" => $row["count_date"],
				"count" => $row["counted_leads"]);
			array_push($chart_data, $data);
		}

		return $chart_data;
	} else {
		return array();
	}
}

function readAuthorNameByID($conn, $id) {
	$sql = "SELECT firstName, lastName FROM authors where id=".$id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["firstName"] . " " . $row["lastName"];
			return $name;
		}
	} else {
		return 'None';
	}
}

function readLikesByPostID($post_id) {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, authorId, datePublished FROM likes where postId=".$post_id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    $likes_arr=array();

		while($row = mysqli_fetch_assoc($result)) {
			$author = readAuthorNameByID($conn, $row["authorId"]);
	        $product_item=array(
	            "id" => $row["id"],
	            "author" => $author,
	            "datePublished" => $row["datePublished"]);
	        array_push($likes_arr, $product_item);
	    }
	    return $likes_arr;
	} else {
		return array();
	}
}

function readCommentsByPostID($post_id) {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, `text`, authorId, datePublished FROM comments where postId=".$post_id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    $comments_arr=array();

		while($row = mysqli_fetch_assoc($result)) {
			$author = readAuthorNameByID($conn, $row["authorId"]);
	        $product_item=array(
	            "id" => $row["id"],
	            "text" => $row["text"],
	            "author" => $author,
	            "datePublished" => $row["datePublished"]);
	        array_push($comments_arr, $product_item);
	    }
	    return $comments_arr;
	} else {
		return array();
	}
}


function readPostByID($id){
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, title, description, authorId, datePublished, numComments, numLikes FROM posts where id=".$id;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_assoc($result)) {
			$author = readAuthorNameByID($conn, $row["authorId"]);
			$comments = readCommentsByPostID($row["id"]);
			$likes = readLikesByPostID($row["id"]);
	        $product_item=array(
	            "id" => $row["id"],
	            "title" => $row["title"],
	            "description" => $row["description"],
	            "author" => $author,
	            "datePublished" => $row["datePublished"],
	            "numComments" => $row["numComments"],
	            "numLikes" => $row["numLikes"],
	            "comments" => $comments,
	            "likes" => $likes);
		    http_response_code(200);
		    return json_encode($product_item);
	    }
	} else {
	    http_response_code(404);
	    echo json_encode(
	        array("message" => "No products found.")
	    );
	}
}

function readAllPosts($startDate = '', $endDate = '') {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, title, authorId, datePublished, numComments, numLikes FROM posts";
	if($startDate != '' && $endDate != '') {
		$sql = $sql . " where datePublished >= '" . $startDate . "' AND datePublished <= '" . $endDate . "'";
	}
	$sql = $sql . " order by numComments desc, numLikes desc";
	// echo $sql;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    $posts_arr=array();
	    $posts_arr["posts"]=array();

		while($row = mysqli_fetch_assoc($result)) {
			$author = readAuthorNameByID($conn, $row["authorId"]);
	        $product_item=array(
	            "id" => $row["id"],
	            "title" => $row["title"],
	            // "description" => $row["description"],
	            "authorId" => $author,
	            "datePublished" => $row["datePublished"],
	            "numComments" => $row["numComments"],
	            "numLikes" => $row["numLikes"],
	        	"action" => $row["authorId"]);
	        array_push($posts_arr["posts"], $product_item);
	    }
	    http_response_code(200);
	    return json_encode($posts_arr);
	} else {
	    http_response_code(404);
	    echo json_encode(
	        array("message" => "No products found.")
	    );
	}
}

function readAllAuthors() {
	$db = new Database();
	$conn = $db->getConnection();

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, firstName, lastName, phone, numPosts, numComments, numLikes FROM authors order by numPosts desc, numComments desc, numLikes desc";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    $auth_arr=array();
	    $auth_arr["authors"]=array();

		while($row = mysqli_fetch_assoc($result)) {
	        $product_item=array(
	            "id" => $row["id"],
	            "firstName" => $row["firstName"],
	            "lastName" => $row["lastName"],
	            "phone" => $row["phone"],
	            "numPosts" => $row["numPosts"],
	            "numComments" => $row["numComments"],
	            "numLikes" => $row["numLikes"]);
	        array_push($auth_arr["authors"], $product_item);
	    }
	    http_response_code(200);
	    return json_encode($auth_arr);
	} else {
	    http_response_code(404);
	    echo json_encode(
	        array("message" => "No products found.")
	    );
	}
}
?>