<?php

session_start();

if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] !== 3) {
    header('Location: ../../auth.php');
    exit;
}

include '../../../utils/database/helper.php';
include '../../../utils/number.php';

$instructorCount = fetch('SELECT COUNT(*) AS count FROM instructors')[0];
$instructors = fetch('SELECT 
                        i.name, 
                        cr.email, 
                        COUNT(*) AS course
                    FROM 
                        instructors i
                    JOIN 
                        credentials cr ON i.credential_id = cr.id
                    JOIN 
                        courses co ON i.id = co.instructor_id
                    GROUP BY 
                        i.name, cr.email
');
$waitingApproval = fetch('SELECT 
                            c.id as id,
                            c.name as course, 
                            cc.name as category, 
                            c.level as level, 
                            i.name AS instructor, 
                            c.price as price
                        FROM 
                            courses c
                        JOIN 
                            instructors i ON c.instructor_id = i.id
                        JOIN 
                            course_categories cc ON c.category_id = cc.id
                        WHERE 
                            c.status = "Menunggu";
');
$Approved = fetch('SELECT 
                        c.id as id,
                        c.name as course, 
                        cc.name as category, 
                        c.level as level, 
                        i.name as instructor, 
                        c.price as price
                    FROM 
                        courses c
                    JOIN 
                        instructors i ON c.instructor_id = i.id
                    JOIN 
                        course_categories cc ON c.category_id = cc.id
                    WHERE 
                        c.status = "Disetujui";'
);

$withdrawalRequests = fetch('SELECT 
                                w.id, 
                                i.id AS instructor_id,
                                i.name AS instructor_name,
                                w.amount, 
                                w.payment_method
                            FROM 
                                withdrawal_requests w
                            JOIN 
                                instructors i ON w.instructor_id = i.id
                            WHERE 
                                w.status = "pending"');

?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengajar - Admin Djangourse</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/instructor-management.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <img src="../../../assets/img/logo-django.png" alt="" width="120px">
            <nav>
                <ul>
                    <li><a href="dashboard.php">
                            <iconify-icon icon="material-symbols:dashboard" class="sidebar-icon"></iconify-icon>Dasbor
                        </a></li>
                    <li><a href="student-management.php">
                            <iconify-icon icon="ph:student" class="sidebar-icon"></iconify-icon>Siswa
                        </a></li>
                    <li><a href="instructor-management.php" class="sidebar-on">
                            <iconify-icon icon="mdi:teacher" class="sidebar-icon"></iconify-icon>Pengajar
                        </a></li>
                    <li><a href="report.php">
                            <iconify-icon icon="mage:chart-25" class="sidebar-icon"></iconify-icon>Laporan
                        </a></li>
                    <li><a href="setting.php">
                            <iconify-icon icon="uil:setting" class="sidebar-icon"></iconify-icon>Pengaturan
                        </a></li>
                    <li><a href="../../logout.php">
                            <iconify-icon icon="material-symbols:logout" class="sidebar-icon"></iconify-icon>Keluar
                        </a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Manajemen Pengajar</h1>
            </header>

            <section class="instructor-count-section">
                <div class="instructor-count-content">
                    <iconify-icon icon="mdi:teacher" class="instructor-count-icon"></iconify-icon>
                    <p class="text-wrapper">Jumlah Pengajar</p>
                    <p class="text-counter"><?php echo $instructorCount['count']; ?></p>
                </div>
            </section>

            <section>
                <h2>Data Pengajar</h2>
                <table id="instructor-data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kursus Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($instructors)): ?>
                        <?php foreach ($instructors as $instructor): ?>
                        <tr>
                        <td><?= $instructor['name']; ?></td>
                        <td><?= $instructor['email']; ?></td>
                        <td><?= $instructor['course']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                <?php endif; ?>
                    </tbody>
                </table>
            </section>

            <section class="withdraw-approval-section">
                <h2>Persetujuan Penarikan</h2>
                <div class="table-box">
                    <p style="display: none;">Belum ada permintaan</p>
                    <table class="common-table">
                        <tr>
                            <td>Nama</td>
                            <td>Jumlah</td>
                            <td>Tujuan Pembayaran</td>
                            <td>Aksi</td>
                        </tr>
                        <?php if (!empty($withdrawalRequests)): ?>
                        <?php foreach ($withdrawalRequests as $withdrawalRequest): ?>
                        <tr>
                            <td><?= $withdrawalRequest['instructor_name'] ?></td>
                            <td><?= 'Rp' . formatAsCurrency($withdrawalRequest['amount']) ?></td>
                            <td><?= $withdrawalRequest['payment_method'] ?></td>
                            <td>
                                <a href="#" class="btn-approve withdrawal-approvement" data-id="<?php echo $withdrawalRequest['id']; ?>" data-instructor_id="<?= $withdrawalRequest['instructor_id'] ?>" data-amount="<?= $withdrawalRequest['amount'] ?>">
                                    <iconify-icon icon="si:check-fill"></iconify-icon>
                                    <span>Setujui</span>
                                </a>
                                <a href="#" class="btn-reject withdrawal-approvement" data-id="<?php echo $withdrawalRequest['id']; ?>" data-instructor_id="<?= $withdrawalRequest['instructor_id'] ?>" data-amount="<?= $withdrawalRequest['amount'] ?>">
                                    <iconify-icon icon="streamline:delete-1-solid"></iconify-icon>
                                    <span>Tolak</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                    </tr>
                <?php endif; ?>
                    </table>
                </div>
            </section>

            <section class="withdraw-approval-section">
                <h2>Persetujuan Penambahan Kursus Baru</h2>
                <div class="table-box">
                    <p style="display: none;">Belum ada permintaan</p>
                    <table class="common-table">
                        <tr>
                            <td>Nama Kursus</td>
                            <td>Kategori</td>
                            <td>Tingkat Kesulitan</td>
                            <td>Pengajar</td>
                            <td>Harga</td>
                            <td>Aksi</td>
                        </tr>
                        <?php if (!empty($waitingApproval)): ?>
                            <?php foreach ($waitingApproval as $course): ?>
                                <tr>
                                    <td><?php echo $course['course'] ?></td>
                                    <td><?php echo $course['category'] ?></td>
                                    <td><?php echo $course['level'] ?></td>
                                    <td><?php echo $course['instructor'] ?></td>
                                    <td><?php echo $course['price'] ?></td>
                                    <td>
                                        <a href="#" class="btn-approve course-approvement" data-id="<?php echo $course['id']; ?>">
                                            <iconify-icon icon="si:check-fill"></iconify-icon>
                                            <span>Setujui</span>
                                        </a>
                                        <a href="#" class="btn-reject course-approvement" data-id="<?php echo $course['id']; ?>">
                                            <iconify-icon icon="streamline:delete-1-solid"></iconify-icon>
                                            <span>Tolak</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </section>

            <section class="withdraw-approval-section">
                <h2>Record</h2>
                <div class="table-box">
                    <p style="display: none;">Belum ada permintaan</p>
                    <table class="common-table">
                        <tr>
                            <td>Nama Kursus</td>
                            <td>Kategori</td>
                            <td>Tingkat Kesulitan</td>
                            <td>Pengajar</td>
                            <td>Harga</td>
                            <td>Aksi</td>
                        </tr>
                        <?php if (!empty($Approved)): ?>
                            <?php foreach ($Approved as $app): ?>
                                <tr>
                                    <td><?php echo $app['course'] ?></td>
                                    <td><?php echo $app['category'] ?></td>
                                    <td><?php echo $app['level'] ?></td>
                                    <td><?php echo $app['instructor'] ?></td>
                                    <td><?php echo $app['price'] ?></td>
                                    <td>
                                        <a href="#" class="btn-approve">
                                            <iconify-icon icon="si:check-fill"></iconify-icon>
                                            <span>Disetujui</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </section>

        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>

        let instructorTable = new DataTable('#instructor-data-table');

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.btn-approve.course-approvement, .btn-reject.course-approvement').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const courseId = this.dataset.id;
                    console.log(courseId);
                    const status = this.classList.contains('btn-approve') ? 'Disetujui' : 'Ditolak';

                    fetch('update-course-status.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                id: courseId,
                                status
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Status updated successfully.');
                                location.reload(); // Reload the page to update the table
                            } else {
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while updating the status.');
                        });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.btn-approve.withdrawal-approvement, .btn-reject.withdrawal-approvement').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const withdrawalRequestId = this.dataset.id;
                    const amount = this.dataset.amount;
                    const instructorId = this.dataset.instructor_id;
                    const status = this.classList.contains('btn-approve') ? 'approved' : 'rejected';

                    fetch('update-withdrawal-status.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                id: withdrawalRequestId,
                                instructorId,
                                amount,
                                status
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Status updated successfully.');
                                location.reload(); // Reload the page to update the table
                            } else {
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while updating the status.');
                        });
                });
            });
        });
    </script>
</body>

</html>