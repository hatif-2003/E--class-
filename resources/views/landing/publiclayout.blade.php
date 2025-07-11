<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title") | {{ env("APP_NAME") }} | A Complete Coaching Center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <!-- Custom CSS for enhanced styling -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f5f7fa;
    }

    .navbar {
      transition: all 0.3s ease;
    }

    .navbar-brand {
      font-size: 1.5rem;
      color: #007bff !important;
      transition: color 0.2s ease;
    }

    .navbar-brand:hover {
      color: #0056b3 !important;
    }

    .nav-link {
      font-weight: 500;
      padding: 0.5rem 1rem !important;
      border-radius: 5px;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .nav-link:hover {
      background-color: #f1f3f5;
      color: #007bff !important;
    }

    .nav-item.dropdown .nav-link {
      padding: 0.25rem !important;
    }

    .profile-img {
      object-fit: cover;
      border: 2px solid #dee2e6;
      transition: transform 0.3s ease;
    }

    .profile-img:hover {
      transform: scale(1.1);
    }

    .dropdown-menu {
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      min-width: 200px;
      animation: fadeIn 0.2s ease-in-out;
    }

    .dropdown-menu .dropdown-item {
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background-color 0.2s ease;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #e9ecef;
    }

    .dropdown-item i {
      width: 20px;
      text-align: center;
      margin-right: 8px;
    }

    .dropdown-divider {
      margin: 0.3rem 0;
      border-color: #e9ecef;
    }

    .user-info {
      padding: 0.75rem 1rem;
      color: #343a40;
    }

    .user-info .user-name {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .user-info .user-email {
      font-size: 0.85rem;
      color: #6c757d;
    }

    .btn-primary {
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      font-weight: 500;
      transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
      .navbar-brand {
        font-size: 1.25rem;
      }

      .nav-link {
        padding: 0.5rem !important;
      }

      .dropdown-menu {
        min-width: 180px;
      }

      .profile-img {
        width: 32px;
        height: 32px;
      }

      .btn-primary {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
      }
    }

    /* Profile Banner */
    .profile-banner {
      background-image: url('{{ asset("storage/default/office.jpg") }}');
      background-size: cover;
      background-position: center;
      padding: 30px;
      color: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .profile-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
    }

    .left {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .left img {
      border: 3px solid white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .left h4 {
      margin: 0;
      font-size: 1.5rem;
    }

    .left p {
      margin: 5px 0 0;
      font-size: 1rem;
      opacity: 0.9;
    }

    .btn-primary {
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: 500;
      background: #3b82f6;
      border: none;
      transition: transform 0.2s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      background: #2563eb;
    }

    /* Sidebar */
    .sidebar {
      background: linear-gradient(#7AE5F5);
      color: #0f0c29;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      min-height: 100%;
    }

    .sidebar-header {
      text-align: center;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-header img {
      width: 50px;
      margin-bottom: 10px;
    }

    .sidebar-header h3 {
      font-size: 1.25rem;
      margin: 0;
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      color: #0f0c29;
      text-decoration: none;
      font-size: 0.95rem;
      font-weight: 500;
      border-radius: 5px;
      margin: 5px 0;
      transition: all 0.2s ease;
    }

    .sidebar-menu a i {
      width: 24px;
      text-align: center;
      margin-right: 10px;
    }

    .sidebar-menu a:hover {
      background: #302b63;
      color: #3b82f6;
    }

    .sidebar-menu a.active {
      background: #302b63;
      color: #fff;
    }

    .sidebar-menu .dropdown-toggle::after {
      margin-left: auto;
      transition: transform 0.2s ease;
    }

    .sidebar-menu .dropdown-toggle.active::after {
      transform: rotate(180deg);
    }

    .sidebar-menu .dropdown-menu {
      background: #302b63;

      padding: 0;
      display: none;
    }

    .sidebar-menu .dropdown-menu a {
      padding-left: 45px;
      color: white;
      font-size: 0.9rem;
    }

    .sidebar-menu .dropdown-menu a:hover {
      background: rgba(255, 255, 255, 0.05);
    }

    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 20px;
      left: 20px;
      font-size: 1.5rem;
      color: #fff;
      background: #3b82f6;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      z-index: 1100;
    }

    /* Main Content */
    .main-content {
      padding: 20px;
      background: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .sidebar.active {
        display: block;
        width: 100%;
      }

      .sidebar-toggle {
        display: block;
      }

      .main-content {
        margin-left: 0;
      }

      .profile-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
      }

      .left {
        flex-direction: column;
      }

      .btn-primary {
        width: 100%;
      }
    }

    /* Custom Styles */
    .features-section {
      background: linear-gradient(135deg, #f5f7fa 0%, #e3e7eb 100%);
      padding: 80px 0;
      position: relative;
      overflow: hidden;
    }

    .course-section {
      background: inear-gradient(135deg, #f0f2f5 0%, #d9dee3 100%);


      padding: 80px 0;
      position: relative;
      overflow: hidden;
    }

    .course-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://www.transparenttextures.com/patterns/subtle-dots.png');
      opacity: 0.1;
    }

    .features-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://www.transparenttextures.com/patterns/subtle-dots.png');
      opacity: 0.1;
    }

    .course-section h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #2c528b;

      margin-bottom: 10px;
    }

    .features-section h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1a3c6d;
      margin-bottom: 20px;
    }

    .features-section p.subtitle {
      font-size: 1.1rem;
      color: #5a6a85;
      margin-bottom: 50px;
    }

    .course-section p.c-subtitle {
      font-size: 1.1rem;
      color: #6c7a99;
      margin-bottom: 40px;
    }

    .feature-box {
      background: #ffffff;
      border-radius: 15px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .feature-box:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    }

    .feature-box .icon {
      font-size: 2.5rem;
      color: #1a3c6d;
      margin-bottom: 20px;
      transition: color 0.3s ease;
    }

    .feature-box:hover .icon {
      color: #0d47a1;
    }

    .feature-box h4 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #1a3c6d;
      margin-bottom: 15px;
    }

    .feature-box p {
      font-size: 1rem;
      color: #5a6a85;
      line-height: 1.6;
    }

    @media (max-width: 768px) {
      .features-section h2 {
        font-size: 2rem;
      }

      .feature-box {
        padding: 20px;
      }
    }

    .footer {
      background: linear-gradient(180deg, #1a252f 0%, #0f151a 100%);
      font-family: 'Arial', sans-serif;
    }

    .footer-logo {
      font-size: 1.75rem;
      font-weight: 700;
    }

    .footer h5 {
      font-size: 1.25rem;
      font-weight: 600;
    }

    .footer .text-muted {
      color: #b0b8c1 !important;
    }

    .footer .hover-link:hover {
      color: #ffffff !important;
      text-decoration: underline;
    }

    .social-icons i {
      font-size: 1.2rem;
      transition: color 0.3s ease;
    }

    .social-icons a:hover i {
      color: #007bff;
    }

    .footer ul li {
      margin-bottom: 0.5rem;
    }

    .footer .input-group .form-control {
      background-color: #2a3642;
      border: none;
      color: #ffffff;
    }

    .footer .input-group .form-control::placeholder {
      color: #b0b8c1;
    }

    .footer .btn-primary {
      background-color: #007bff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .footer .btn-primary:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .footer-logo {
        font-size: 1.5rem;
      }

      .footer h5 {
        font-size: 1.1rem;
      }

      .footer .input-group {
        max-width: 100%;
      }
    }

    .course-card {
      max-width: 350px;
      margin: 0 auto;
      margin-bottom: 30px;
      font-family: 'Arial', sans-serif;
      position: relative;

    }

    .course-card .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      background: #ffffff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .course-card .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .course-card .discount-badge {
      position: absolute;
      top: 2px;
      left: 10px;
      background: #dc3545;
      color: #ffffff;
      font-size: 0.85rem;
      font-weight: 700;
      padding: 5px 12px;
      border-radius: 20px;
      z-index: 10;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .course-card .card-img-wrapper {
      position: relative;
      overflow: hidden;
    }

    .course-card .card-img-top {
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .course-card .card:hover .card-img-top {
      transform: scale(1.05);
    }

    .course-card .img-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.4) 100%);
      opacity: 0.6;
    }

    .course-card .card-body {
      padding: 20px;
      text-align: center;
    }

    .course-card .card-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #1a3c6d;
      margin-bottom: 10px;
      line-height: 1.3;
    }

    .course-card .teacher {
      font-size: 0.95rem;
      color: #5a6a85;
      margin-bottom: 12px;
      font-style: italic;
    }

    .course-card .price-section {
      margin-bottom: 15px;
    }

    .course-card .discounted-price {
      font-size: 1.2rem;
      font-weight: 600;
      color: #dc3545;
      margin-right: 10px;
    }

    .course-card .original-price {
      font-size: 0.95rem;
      color: #5a6a85;
    }

    .course-card .enroll-btn {
      background: #007bff;
      border: none;
      border-radius: 25px;
      padding: 10px 20px;
      font-size: 0.9rem;
      font-weight: 600;
      text-transform: uppercase;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .course-card .enroll-btn:hover {
      background: #0056b3;
      transform: scale(1.05);
    }

    @media (max-width: 576px) {
      .course-card {
        max-width: 100%;
        margin-bottom: 30px;
      }

      .course-card .card-title {
        font-size: 1.2rem;
      }

      .course-card .teacher {
        font-size: 0.85rem;
      }

      .course-card .discounted-price {
        font-size: 1.1rem;
      }

      .course-card .original-price {
        font-size: 0.85rem;

        _movie_card {
          max-width: 100%;
        }

        .course-card .card-title {
          font-size: 1.2rem;
        }

        .course-card .teacher {
          font-size: 0.85rem;
        }

        .course-card .discounted-price {
          font-size: 1.1rem;
        }

        .course-card .original-price {
          font-size: 0.85rem;
        }
      }



    }

    .course-view-section {
      padding: 60px 0;
    }

    .course-header {
      position: relative;
      background: linear-gradient(135deg, #d0eaff 0%, #90caf9 100%);
      margin-bottom: 40px;
      color: #ffffff;
      padding: 40px 0;
      border-radius: 15px 15px 0 0;
      overflow: hidden;
    }

    .course-header .discount-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: #ff5252;
      /* Brighter red for better contrast on light background */
      color: #ffffff;
      font-size: 1rem;
      font-weight: 700;
      padding: 8px 15px;
      border-radius: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .course-header h1 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 15px;
      color: #0d47a1;
      /* Deep blue for better contrast on sky blue bg */
    }

    .course-header .author {
      font-size: 1.1rem;
      font-style: italic;
      color: #1a3c6d;
      /* Slightly darker than background for readability */
    }

    .course-image-card img {
      width: 100%;
      height: 375px;
      object-fit: cover;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);

    }


    .course-details-card {
      background: #ffffff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }


    .course-details h2 {
      font-size: 1.8rem;
      color: #1a3c6d;
      margin-bottom: 20px;
    }

    .course-details p {
      font-size: 1rem;
      color: #5a6a85;
      line-height: 1.6;
    }

    .price-section {
      margin: 20px 0;
    }

    .discounted-price {
      font-size: 1.5rem;
      font-weight: 600;
      color: #dc3545;
      margin-right: 15px;
    }

    .original-price {
      font-size: 1.2rem;
      color: #5a6a85;
      text-decoration: line-through;
    }

    .duration {
      font-size: 1rem;
      color: #5a6a85;
      margin-bottom: 20px;
    }

    .enroll-btn {
      background: #007bff;
      border: none;
      border-radius: 25px;
      padding: 12px 30px;
      font-size: 1rem;
      font-weight: 600;
      text-transform: uppercase;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .enroll-btn:hover {
      background: #0056b3;
      transform: scale(1.05);
    }

    .related-courses {
      margin-top: 50px;
    }

    .related-courses h2 {
      font-size: 1.8rem;
      color: #1a3c6d;
      margin-bottom: 30px;
    }

    .related-card {
      max-width: 350px;
      margin: 0 auto;
    }

    .related-card .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      background: #ffffff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .related-card .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .related-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .related-card .card-body {
      padding: 20px;
      text-align: center;
    }

    .related-card .card-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #1a3c6d;
      margin-bottom: 10px;
    }

    .related-card .teacher {
      font-size: 0.95rem;
      color: #5a6a85;
      margin-bottom: 15px;
      font-style: italic;
    }

    @media (max-width: 768px) {
      .course-header h1 {
        font-size: 2rem;
      }

      .course-image img {
        height: 300px;
      }

      .course-details {
        padding: 20px;
      }

      .discounted-price {
        font-size: 1.3rem;
      }

      .original-price {
        font-size: 1rem;
      }
    }

    /* Student Table */
    .student-table-container {
      background: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      min-height: calc(100vh - 40px);
    }

    .student-table {
      background: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      border-collapse: separate;
      border-spacing: 0;
    }

    .student-table thead {
      background: linear-gradient(45deg, #1a1a2e, #16213e);
      color: #fff;
    }

    .student-table th {
      white-space: nowrap;
      font-weight: 600;
      padding: 15px;
      text-align: left;
      position: relative;
    }

    .student-table th.sortable {
      padding-right: 25px;
    }

    /* Action Column Styling */
    .student-table td:last-child {
      white-space: nowrap;
      vertical-align: middle;
    }


    .student-table th.sortable::after {
      content: "\f0dc";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0.7;
    }

    .student-table td {
      padding: 12px 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      /* vertical-align: middle; */
    }

    .student-table tbody tr:hover {
      background: rgba(59, 130, 246, 0.05);
      transition: background 0.2s ease;
    }

    /* Action Buttons */
    .action-btn {
      padding: 8px 14px;
      border-radius: 3px;
      font-size: 1rem;
      width: 20px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      border: none;
      cursor: pointer;
      transition: 0.2s ease-in-out;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }


    .action-btn i {
      font-size: 1.1rem;
    }

    .action-btn.edit {
      background: #3b82f6;
      color: #fff;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;

    }

    .action-btn.delete {
      background: #ef4444;
      color: #fff;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
    }

    .action-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .action-btn.edit:hover {
      background: #2563eb;
    }

    .action-btn.delete:hover {
      background: #dc2626;
    }

    @media (max-width: 768px) {
      .student-table-container {
        margin: 0;
        min-height: auto;
      }

      .student-table-container h2 {
        font-size: 1rem;
      }

      .student-table {
        min-width: 600px;
      }

      .student-table th,
      .student-table td {
        font-size: 0.75rem;
        white-space: nowrap;
      }

      .action-btn {
        padding: 4px 6px;
        font-size: 0.7rem;
      }

      .student-table td .action-btn i {
        font-size: 14px;
      }

    }

    @media (max-width: 768px) {
      .footer-logo {
        font-size: 1.5rem;
      }

      .footer h5 {
        font-size: 1.1rem;
      }

      .footer .input-group {
        max-width: 100%;
      }
    }

    .gradient-custom {
      /* fallback for old browsers */
      background: #f6d365;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }
     .gradient-bg {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .team-member {
            transition: transform 0.3s ease, background-color 0.3s ease;
            border-radius: 10px;
        }
        .team-member:hover {
            transform: scale(1.05);
            background-color: #e9ecef;
        }
        .animate-slide-in {
            animation: slideIn 1s ease-out forwards;
        }
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            animation-delay: calc(var(--delay) * 1s);
            opacity: 0;
        }
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-3 px-4 fixed-top">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand fw-bold" href="{{ route('public.home') }}">
        <i class="fas fa-graduation-cap me-2"></i>{{ env('APP_NAME') }}
      </a>

      <!-- Toggler for Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
          <!-- Home Link -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('public.home') }}"><i class="fas fa-home me-1"></i>Home</a>
          </li>

          @auth
          <!-- User Dropdown -->
          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle d-flex align-items-center rounded-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img
                src="{{ Auth::check() && Auth::user()->image && file_exists(storage_path('app/public/' . Auth::user()->image)) ? asset('storage/' . Auth::user()->image) : asset('default/default-user.jpg') }}"
                class="rounded-circle profile-img me-2"
                width="40"
                height="40"
                alt="Profile"
                loading="lazy"
                onerror="this.src='https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=mp'" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="user-info text-center">
                <div class="user-name">{{ Auth::user()->name ?? 'Guest' }}</div>
                <div class="user-email">{{ Auth::user()->email ?? 'guest@example.com' }}</div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route("student.dashboard") }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li><a class="dropdown-item" href=""><i class="fas fa-user"></i> Profile</a></li>
              <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="fa-solid fa-pen-to-square"></i>Edit Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-danger" href="{{ route('public.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </li>
          @endauth

          @guest
          <!-- Guest Links -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i>Student Login</a>
          </li>
          <li class="nav-item ms-3">
            <a class="btn btn-primary" href="{{ route('public.apply') }}"><i class="fas fa-user-plus me-1"></i>Apply For Admission</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  @section("content")
  @show
  <!-- Footer -->
  <x-footer />
  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-3">
            <img
              src="{{ Auth::check() && Auth::user()->image && file_exists(storage_path('app/public/' . Auth::user()->image)) ? asset('storage/' . Auth::user()->image) : asset('default/default-user.jpg') }}"
              class="rounded-circle profile-img me-2"
              width="40"
              height="40"
              alt="Profile"
              loading="lazy"
              onerror="this.src='https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=mp'" />
          </div>
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : 'Guest' }}
            " class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{Auth::check() ? Auth::user()->email : 'Guest'  }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone">Contact</label>
            <input type="text" name="contact" value="{{ Auth::check() ? Auth::user()->contact : 'Guest' }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone">Education</label>
            <input type="text" name="education" value="{{ Auth::check() ? Auth::user()->education : 'Guest' }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>
      </form>
    </div>
  </div>


  {{-- ✅ Toast Success Message --}}
  @if(session('toast_success'))
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
      <div class="d-flex">
        <div class="toast-body">
          {{ session('toast_success') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  @endif


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

  {{-- ✅ Auto Show Toast --}}
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      const toastLive = document.getElementById('successToast');
      if (toastLive) {
        const toast = new bootstrap.Toast(toastLive, {
          delay: 3000
        });
        toast.show();
      }
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true
    });
  </script>

  @yield('js')


</body>

</html>