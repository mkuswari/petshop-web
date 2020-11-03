<?php

function must_login()
{
	$isLogin = get_instance();
	if (!$isLogin->session->userdata("email")) {
		redirect("auth");
	}
}

function must_admin()
{
	$isAdmin = get_instance();
	if ($isAdmin->session->userdata("role_id") > 1) {
		redirect("auth/blocked");
	}
}

function must_admin_and_staff()
{
	$isAdminAndStaff = get_instance();
	if ($isAdminAndStaff->session->userdata("role_id") > 2) {
		redirect("auth/blocked");
	}
}
