<?php
require_once( __DIR__."/class.wpcom-json-api-publicize-endpoint.php" );

class WPCOM_JSON_API_List_Publicize_Scheduled_Actions_Endpoint extends WPCOM_JSON_API_Publicize_Scheduled_Actions_Endpoint {
    function callback( $path = '', $blog_id = 0, $post_id = 0 ) {
        $blog_id = $this->api->switch_to_blog_and_validate_user( $this->api->get_blog_id( $blog_id ) );
        if ( is_wp_error( $blog_id ) ) {
            return $blog_id;
        }
        if ( ! current_user_can( 'edit_posts' ) ) {
            return new WP_Error( 'unauthorized', 'Your token must have permission to edit posts on this blog.', 401 );
        }
        //TODO: Replace with SQL query
        $scheduled = array(
            array(
                'ID' => 3,
                'share_date' => 1490045140,
                'message' => 'This is a message',
                'connection_id' => 543
            ),
            array(
                'ID' => 4,
                'share_date' => 1490045140,
                'message' => '2 This is a message',
                'connection_id' => 543
            )
        );

        return array( 'items' => $scheduled );
    }
}

class WPCOM_JSON_API_List_Publicize_Published_Actions_Endpoint extends WPCOM_JSON_API_Publicize_Scheduled_Actions_Endpoint {
    function callback( $path = '', $blog_id = 0, $post_id = 0 ) {
        $blog_id = $this->api->switch_to_blog_and_validate_user( $this->api->get_blog_id( $blog_id ) );
        if ( is_wp_error( $blog_id ) ) {
            return $blog_id;
        }
        if ( ! current_user_can( 'edit_posts' ) ) {
            return new WP_Error( 'unauthorized', 'Your token must have permission to edit posts on this blog.', 401 );
        }
        //TODO: Replace with SQL query
        $scheduled = array(
            array(
                'ID' => 3,
                'url' => 'https://twitter.com/artpitesting/status/844266398285287424',
                'share_date' => 1490045140,
                'message' => 'This is a message',
                'connection_id' => 543
            ),
            array(
                'ID' => 4,
                'url' => 'https://twitter.com/artpitesting/status/844266398285287424',
                'share_date' => 1490045140,
                'message' => '2 This is a message',
                'connection_id' => 543
            )
        );

        return array( 'items' => $scheduled );
    }
}

class WPCOM_JSON_API_Edit_Publicize_Scheduled_Action_Endpoint extends WPCOM_JSON_API_Publicize_Scheduled_Actions_Endpoint {
    function callback( $path = '', $blog_id = 0, $post_id = 0, $id='' ) {
        $blog_id = $this->api->switch_to_blog_and_validate_user( $this->api->get_blog_id( $blog_id ) );
        if ( is_wp_error( $blog_id ) ) {
            return $blog_id;
        }
        if ( ! current_user_can( 'edit_posts' ) ) {
            return new WP_Error( 'unauthorized', 'Your token must have permission to edit posts on this blog.', 401 );
        }

        //TODO
        //  if( ! isset( $action[ 'share_date' ] ) || ! isset( $action[ 'connection_id' ] ) ) {
        //     return new WP_Error( 'not_found', 'The action you want to modify has not been found.', 404 );
        // }
        $input = $this->input( false );
        $message = isset( $input['message'] ) ? trim( $input['message'] ) : null;
        $share_date = isset( $input['share_date'] ) && $input['share_date'] ? $input['share_date'] : time();

        //Save edited information
        $new = array(
            'share_date' => $share_date,
            'message' => $message,
            'blog_id' => $blog_id,
            'post_id' => $post_id,
            'connection_id' => 12345
        );

        return array( 'item' => $new );
    }
}

class WPCOM_JSON_API_Delete_Publicize_Scheduled_Action_Endpoint extends WPCOM_JSON_API_Publicize_Scheduled_Actions_Endpoint {
    function callback( $path = '', $blog_id = 0, $post_id = 0, $id='' ) {
        $blog_id = $this->api->switch_to_blog_and_validate_user( $this->api->get_blog_id( $blog_id ) );
        if ( is_wp_error( $blog_id ) ) {
            return $blog_id;
        }
        if ( ! current_user_can( 'edit_posts' ) ) {
            return new WP_Error( 'unauthorized', 'Your token must have permission to edit posts on this blog.', 401 );
        }
        //TODO
        //  if( ! isset( $action[ 'share_date' ] ) && ! isset( $action[ 'connection_id' ] ) ) {
        //     return new WP_Error( 'not_found', 'The action you want to modify has not been found.', 404 );
        // }

        return array( 'success' => true );
    }
}

