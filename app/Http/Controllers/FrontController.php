<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data['section_title'] = "BIKERS BROTHERHOOD <strong>1%</strong> MC";
        $data['section_body'] = "Berawal dari sekumpulan manusia yang mencintai dan menggunakan motor klasik buatan Amerika dan Eropa sehingga menjadi ciri khas klub Motor ini. Didirikan di Bandung pada 13 Juni 1988.

        <strong>1%</strong> Adalah 1% (One Percent) dari seluruh motorcycle club di Indonesia yang secara militan peduli terhadap bangsa.";
        $data['section_img'] = "wp-content/uploads/2022/06/about-us-img-01.webp";

        $data['section_title2'] = "el presidente";
        $data['section_body2'] = "EL PRESIDENTE merupakan pemimpin tertinggi dan pemegang keputusan tertinggi dalam kepengurusan Bikers Brotherhood <strong>1%</strong>  MC. EL PRESIDENTE diangkat dalam Musyawarah Persaudaraan setelah dipilih oleh seluruh anggota Bikers Brotherhood <strong>1%</strong>  MC untuk massa kepemimpinan selama 4 (empat) tahun dan bertanggung jawab kepada seluruh anggota melalui Musyawarah Persaudaraan.";
        $data['section_img2'] = "wp-content/uploads/2023/01/1-scaled.webp";

        $data['section_title3'] = "CHAMBER OF KLAN";
        $data['section_body3'] = "CHAMBER OF KLAN Adalah lembaga non struktural yang Memelihara arah kebijakan, masukan dan pertimbangan kepada EL PRESIDENTE, dengan beranggotakan Ex-President";
        $data['section_img3'] = "wp-content/uploads/2023/01/2-scaled.webp";
        $data['section_img31'] = "wp-content/uploads/2023/01/3.png";
        $data['section_img32'] = "wp-content/uploads/2023/01/4-scaled.webp";

        return view('front/index', compact('data'));
    }

    public function about_us()
    {
        $data['section_title'] = "BIKERS BROTHERHOOD <strong>1%</strong> MC";
        $data['section_body'] = "Klub Motor yang menjunjung tinggi nilai persaudaraan sebagai jalan hidup, tanpa membedakan suku, ras, agama dan bangsa dengan tujuan utama untuk kemanusiaan. Berawal dari sekumpulan manusia yang mencintai dan menggunakan motor klasik buatan Amerika dan Eropa sehingga menjadi ciri khas klub Motor ini. Didirikan di Bandung pada 13 Juni 1988.

        <strong>1%</strong> Adalah 1% (One Percent) dari seluruh motorcycle club di Indonesia yang secara militan peduli terhadap bangsa.";
        $data['section_img'] = "wp-content/uploads/2022/06/1.webp";

        $data['section_title2'] = "HUKUM PERSAUDARAAN";

        $data['section_subtitle'] = "Brotherhood";
        $data['section_subbody'] = "Persaudaraan Tanpa Batas.";

        $data['section_subtitle2'] = "Loyal";
        $data['section_subbody2'] = "Setia Terhadap BIKERS BROTHERHOOD 1% MC.";

        $data['section_subtitle3'] = "Respect";
        $data['section_subbody3'] = "Saling Menghormati Demi Keutuhan BIKERS BROTHERHOOD 1% MC.";

        $data['section_subtitle4'] = "Honour";
        $data['section_subbody4'] = "Menjungjung Tinggi Dan Menjaga Kehormatan BIKERS BROTHERHOOD 1% MC.";

        $data['section_subtitle5'] = "Pride";
        $data['section_subbody5'] = "Menjaga Kebanggaan Sebagai anggota BIKERS BROTHERHOOD 1% MC.";

        return view('front/about-us', compact('data'));
    }

    public function el_presidente()
    {
        $data['section_body'] = "<li>EL PRESIDENTE merupakan pemimpin tertinggi dan pemegang keputusan tertinggi dalam kepengurusan Bikers Brotherhoodc <strong>1%</strong> MC.</li>
        <li>EL PRESIDENTE diangkat dalam Musyawarah Persaudaraan setelah dipilih oleh seluruh anggota Bikers Brotherhood <strong>1%</strong> MC untuk masa kepemimpinan selama 4 (empat) tahun dan bertanggung jawab kepada seluruh anggota melalui Musyawarah Persaudaraan.</li>
        <li>EL PRESIDENTE menjalankan sistem yang telah ditetapkan, berhak mengangkat dan memberhentikan seluruh anggota kepengurusan BIKERS BROTHERHOOD <strong>1%</strong> MC dan bertanggung jawab penuh terhadap kelangsungan kepengurusan Bikers Brotherhood <strong>1%</strong> MC Indonesia.</li>
        <li>EL PRESIDENTE mempunyai hak dan kewajiban untuk mengambil setiap keputusan.</li>";

        $data['section_img'] = "sang-pemimpin-01.webp";

        return view('front/el-presidente', compact('data'));
    }

    public function one_program()
    {
        return view('front/1-program');
    }

    public function for_faith()
    {
        $data['section_title'] = "WHAT IS BFF?";
        $data['section_body'] = "Program Kerja BFF merupakan implementasi Pengabdian nyata kepada Keluarga Besar BB1%MC, Masyarakat dan Bangsa Indonesia Dalam Lingkup Keberagaman Keyakinan Bangsa Indonesia sesuai dengan UUD 1945 &amp; Pancasila, Diselenggarakan oleh Seluruh Members &amp; Keluarga BB1%MCIndonesia. Sinergitas program BB1%MC dan Seluruh Stakeholder / masyarakat (Lembaga Pemerintahan (Kemenag RI-Ormas Keagamaan), Perusahaan Negara atau Swasta, Lembaga Pendidikan juga perorangan.";
        $data['section_img'] = "wp-content/uploads/2022/08/BFF-thumbnail-img.webp";

        $data['section_title2'] = "Latar Belakang";
        $data['section_body2'] = "Tindakan nyata BFF sebagai salah satu Wing Squad BB1%MC dalam kegiatan sosial secara langsung dan mampu menyentuh masyarakat.";
        $data['section_img2'] = "wp-content/uploads/2022/08/BFF-TN-005-300x300.webp";
        $data['section_img21'] = "wp-content/uploads/2022/08/BFF-TN-009-300x300.webp";
        $data['section_img22'] = "wp-content/uploads/2022/08/BFF-TN-006-300x300.webp";

        $data['section_title3'] = "TUJUAN";
        $data['section_body3'] = "Terwujudnya kegiatan sosial Pengabdian kepada Masyarakat dalam lingkup keyakinan beragama yang diakui di Negara Indonesia";
        $data['section_body31'] = "Terwujudnya kemitraan dengan Lembaga Sosial, institusi pemerintahan (Kementrian Agama - Ormas Keagamaan dan masyarakat umum, Perorangan";
        $data['section_body32'] = "Meningkatnya kepedulian terhadap masyarakat di kalangan Keluarga Besar BB1%MC.";

        $data['section_title4'] = "Program";
        $data['section_body4'] = "<li>Kegiatan Penyaluran Beras secara Rutin Sinergi BB1%MC dengan Gerakan Infaq Beras (GIB) di seluruh Indonesia, yang bias dilakukan oleh seluruh chapter berkordinasi dengan Gerakan Infaq beras disetiap Provinsi</li>
        <li>Penyediaan Mobil Layanan Serbaguna yang Rencana Pendanaan bersumber dari penjualan &amp; lelang Merchandise BFF &amp; BB1%MC di seluruh chapter (skala prioritas Dan Bertahap)</li>
        <li>Penyediaan Bikers Hills (Tempat Pemakaman) dengan melakukan kerjasama dengan Ormas<br />Keagamaan, Pemerintah, Swasta, Perorangan &amp; lelang wakaf di seluruh chapter (skala prioritas<br />Dan Bertahap)</li>
        <li>Membina Dan Menjaga Toleransi Antara Keyakinan Seluruh Member &amp; Keluarga Besar BB1%MC dalam HBK (Hari Besar Keagamaan) sesuai UUD 1945</li>
        <li>Menambahkan Program yang dianggap perlu dikemudian hari.</li>";

        $data['section_img4'] = "wp-content/uploads/2022/08/BFF-TN-007.webp";
        $data['section_img41'] = "wp-content/uploads/2022/08/BFF-TN-004.webp";
        $data['section_img42'] = "wp-content/uploads/2022/08/BFF-TN-009.webp";
        $data['section_img43'] = "wp-content/uploads/2022/08/BFF-TN-001.webp";
        $data['section_img44'] = "wp-content/uploads/2022/08/BFF-TN-008.webp";
        $data['section_img45'] = "wp-content/uploads/2022/08/BFF-TN-010.webp";
        $data['section_img46'] = "wp-content/uploads/2022/08/BFF-TN-003.webp";
        $data['section_img47'] = "wp-content/uploads/2022/08/BFF-TN-011.webp";
        $data['section_img48'] = "wp-content/uploads/2022/08/BFF-TN-012.webp";
        $data['section_img49'] = "wp-content/uploads/2022/08/BFF-TN-002.webp";

        return view('front/for-faith', compact('data'));
    }

    public function for_nature()
    {
        $data['section_title'] = "WHAT IS BFN?";
        $data['section_body'] = "Brotherhood for Nature (BFN) adalah salah satu kegiatan dari program Bakti Untuk Negeri yang diprakarsai oleh Bikers Brotherhood 1% MC Indonesia. BFN, bersama dengan kegiatan Bakti Untuk Negeri lainnya, berada di bawah koordinasi dan arahan pengurus pusat BB1%MC Indonesia melalui Wing Squad yang dibantu oleh para Wing Squad Officer (WSO) atau Social Development Officer (SDO)
       
        Brotherhood for Nature atau “persaudaraan untuk alam” merupakan wadah kegiatan komunitas yang mengkampanyekan kepedulian pada lingkungan hidup dan kehidupan di bumi.";
        $data['section_img'] = "wp-content/uploads/2022/08/bfn-images-001-1024x960.webp";

        $data['section_body2'] = "Pelibatan masyarakat, termasuk BFN yang turut berperan aktif dalam perlindungan dan pengelolaan lingkungan, sejalan dengan amanah UU 32/2009, tentang Perlindungan dan Pengelolaan Lingkungan Hidup, pasal 70.
        
        UU Nomor 32 Tahun 2009, Pasal 70:
        (1) Masyarakat memiliki hak dan kesempatan yang sama dan seluas-luasnya untuk berperan aktif dalam perlindungan dan pengelolaan lingkungan hidup.
        (2) Peran masyarakat dapat berupa:
        a. pengawasan sosial;
        b. pemberian saran, pendapat, usul, keberatan, pengaduan; dan/atau
        c. penyampaian informasi dan/atau laporan.
        (3) Peran masyarakat dilakukan untuk:
        a. meningkatkan kepedulian dalam perlindungan dan pengelolaan lingkungan hidup;
        b. meningkatkan kemandirian, keberdayaan masyarakat, dan kemitraan;
        c. menumbuhkembangkan kemampuan dan kepeloporan masyarakat;
        d. menumbuhkembangkan ketanggapsegeraan masyarakat untuk melakukan pengawasan sosial; dan
        e. mengembangkan dan menjaga budaya dan kearifan lokal dalam rangka pelestarian fungsi lingkungan hidup.";
        $data['section_img2'] = "wp-content/uploads/2022/08/bfn-images-002-1024x960.webp";

        $data['section_title3'] = "Visi & Misi";
        $data['section_body3'] = "Sebagai salah satu kegiatan dari program Bakti Untuk Negeri BB1%MC, kerja-kerja BFN akan mengarah kepada suatu pencapaian jangka panjang atau VISI, yaitu:<br />“Lingkungan hidup yang lestari sebagai tempat interaksi manusia dengan alam yang seimbang di Indonesia";
        $data['section_body31'] = "<li>Menguatkan kapasitas dan keterampilan anggota BFN tentang isu yang relevan.</li>
        <li>Melakukan edukasi masyarakat tentang perlindungan dan pelestarian lingkungan hidup.</li>
        <li>Mengembangkan media komunikasi, informasi dan edukasi (KIE) sebagai saluran kampanye publik.</li>
        <li>Membangun kemitraan strategis dengan kelompok masyarakat, organisasi/komunitas, pihak swasta dan pemerintah.</li>
        <li>Meningkatkan kemandirian, pemberdayaan dan pastisipasi masyarakat dalam pemeiharaan lingkungan.</li>
        <li>Melakukan pilot project sebagai percontohan aksi pelestarian lingkungan hidup, termasuk konservasi, pengelolaan lahan produktif, pemberdayaan kelompok masyarakat peduli lingkungan.</li>
        <li>Terlibat dalam kegiatan responden darurat terkait isu lingkungan dan kemanusiaan.</li>";

        $data['section_img4'] = "wp-content/uploads/2022/08/bfn-images-007.webp";
        $data['section_img41'] = "wp-content/uploads/2022/08/bfn-images-008.webp";
        $data['section_img42'] = "wp-content/uploads/2022/08/bfn-images-005.webp";
        $data['section_img43'] = "wp-content/uploads/2022/08/bfn-images-003.webp";
        $data['section_img44'] = "wp-content/uploads/2022/08/bfn-images-012.webp";
        $data['section_img45'] = "wp-content/uploads/2022/08/bfn-images-010.webp";
        $data['section_img46'] = "wp-content/uploads/2022/08/bfn-images-011.webp";
        $data['section_img47'] = "wp-content/uploads/2022/08/bfn-images-004.webp";
        $data['section_img48'] = "wp-content/uploads/2022/08/bfn-images-009.webp";
        $data['section_img49'] = "wp-content/uploads/2022/08/bfn-images-006.webp";

        return view('front/for-nature', compact('data'));
    }

    public function for_indonesia_culture()
    {
        $data['section_title'] = "BROTHERHOOD FOR INDONESIAN CULTURE";
        $data['section_body'] = "Bikers Brotherhood 1% diawali oleh munculnya sosok Lucky Hendrawan atau lebih dikenal dengan panggilan Kang Uci dengan sebutan El Presidente, lalu muncul tokoh selanjutntya sebagai pimpinan organisasi seperti Alm. Yusup Papeuh Sugandi, Alm. Tegep Oktaviansyah, H. Oetomo Wawul Hermawan, Budi Dalton Setiawan dan saat ini El Presidente Bikers Brotherhood 1% Peggy Diar yang mernegang tampuk pimpinan sejak tahun 2016. Para El Presidente Bikers Brotherhood 1% MC dari masa ke masa memberikan sesuatu yang khas di era kepemimpinannya, salah satunya apa yang telah dilakukan oleh El Presidente Budi Dalton di era tahun 2008-2016 dengan membentuk sebuah wadah program kerja Bikers Brotherhood 1 % sesuai dengan tujuan organisasi yaitu Bakti Untuk Negeri.";
        $data['section_img'] = "wp-content/uploads/2022/09/IMG_4080-1-scaled.webp";

        $data['section_body2'] = "Kehidupan manusia tidak terlepas dari kebudayaan. Semua manusia yang hidup di dunia dengan segala faktor yang menyertainya merupakan hasil kebudayaan yang mengandung arti bahwa manusia adalah mahluk yang berbudaya.  Pengertian kebudayaan adalah hasil dari pengolahan rasa, karsa dan cipta manusia dalam hidup bermasyarakat. Kebudayaan dapat berwujud bahasa, teknologi, pola pikir, sistem keyakinan, pengetahuan dan pranata sosial serta seni yang dijadikan sebagai pedoman hidup. Sejak dimulainya peradaban manusia di dunia hingga saat ini, kebudayaan tidak pernah lepas menjadi sebuah identitas manusia atau masyarakat. Di setiap jaman, kebudayaan yang berkembang di satu masyarakat, yang melekat dengan kondisi lingkungannya, menjadi sebuah indikator peradaban dan menjadi ciri khas identitas masyarakat tersebut.";
        $data['section_img2'] = "wp-content/uploads/2022/09/IMG_3851-scaled.jpg";

        $data['section_body3'] = "Jika mengacu kepada perkembangan peradaban di negara Indonesia, kebudayaan sudah melekat sebagai identitas bangsa. Bangsa Indonesia sejak ratusan tahun yang lalu sudah mempunyai identitas budaya sebagai masyarakat yang agraris yang mengandalkan hidupnya dari sumber daya alam. Ciri identitas ini akan berbeda dengan ciri masyarakat  dibelahan dunia yang lain dengan kondisi lingkungan yang berbeda. Leluhur bangsa sudah dikenal sebagai pelaku kebudayaan yang sangat tinggi peradabannya, hal ini dilihat dari produk-produk budaya yang dihasilkan. Dalam kehidupan bermasyarakat, leluhur bangsa tidak pernah mengenal konflik sosial seperti yang banyak ditemukan di era modern seperti sekarang ini. Konflik sosial yang dimaksud adalah seperti perbedaaan keyakinan, perbedaaan pandangan politik, perbedaan ras dan konflik-konflik sosial lainnya yang didasari oleh kepentingan-kepentingan tertentu yang seolah-olah sudah menjadi bagian dari kehidupan sehari-hari. Kondisi ideal hidup bermasyarakat tanpa konflik sosial atau <em>civil society </em>seperti yang pernah dilakukan oleh para leluhur bangsa tentu didasari oleh berbagai faktor diantaranya faktor nilai religi, pranata sosial, pola kepemimpinan, sumber daya alam dan nilai budaya yang berdampak pada terbentuknya mental manusia yang sadar sebagai mahluk sosial. Untuk itu, pengetahuan akan kebudayaan menjadi sangat penting agar dipahami  oleh semua orang, yang pada akhirnya dengan memahami kebudayaan, kita bisa menelaah pola-pola budaya di setiap jaman sehingga kita bisa menciptakan kembali pola budaya seperti cara para leluhur bangsa dahulu agar bisa digunakan di masa sekarang.

        Fenomena yang terjadi saat ini di negara kita, konflik sosial terjadi di depan mata, perbedaan pandangan politik, perbedaan ras, perbedaan keyakinan dan konflik sosial lainnya seolah menjadi hal biasa, padahal jika dibiarkan tidak tertutup kemungkinan akan menjadi bom waktu yang akan meledak menimbulkan konflik fisik dimana pada akhirnya negara akan runtuh oleh perang saudara. Hal ini bisa terjadi di negara kita karena disebabkan oleh nilai-nilai budaya bangsa kita sudah diabaikan dan terkikis oleh pengaruh budaya dari luar melalui penyebaran agama dan budaya populis dengan dalih modernisme, sementara negara tidak hadir secara maksimal dalam hal penyelamatan nilai-nilai budaya yang jelas-jelas berada diambang kepunahan.

        Solusi untuk menghindari kehancuran negara dari ledakan bom kehancuran budaya bangsa adalah dengan menggali kembali nilai-nilai ajaran leluhur bangsa yang pada masanya pernah mengalami era masyarakat yang damai sejahtera dengan ciri peradaban yang sangat tinggi.  Namun tidak mudah untuk bisa menempatkan kembali nilai-nilai budaya bangsa sebagai pedoman hidup mengingat derasnya pengaruh dari luar, apalagi strategi massif yang digunakan oleh bangsa lain untuk mengkerdilkan budaya leluhur bangsa adalah dengan menghilangkan nilai-nilai budaya serta menghancurkan artefak di wilayah kebudayaan

        Saat ini, peran pemerintah dalam pembangunan kebudayaan sudah dilaksanakan, salah satunya adalah dengan menetapkan peninggalan-peninggalan budaya leluhur bangsa sebagai cagar budaya. Namun demikian karena keterbatasan kemampuan pemerintah, ada beberapa peninggalan-peninggalan leluhur bangsa yang sampai saat ini belum terpelihara dan diasumsikan lambat laun akan punah. Untuk itu, Komunitas Bikers Brotherhood MC 1% Indonesia melalui Program Brotherhood For Indonesian Culture (BFIC) akan bergerak langsung dalam hal pelestarian nilai budaya dalam bentuk Kegiatan Pengawasan Wilayah Kebudayaan yang tersebar di seluruh nusantara.";

        $data['section_img4'] = "wp-content/uploads/2022/09/IMG_2335-scaled.webp";
        $data['section_img41'] = "wp-content/uploads/2022/09/IMG_3851-scaled.jpg";
        $data['section_img42'] = "wp-content/uploads/2022/09/IMG_4000-scaled.webp";
        $data['section_img43'] = "wp-content/uploads/2022/09/IMG_4009-scaled.webp";
        $data['section_img44'] = "wp-content/uploads/2022/09/IMG_4010-scaled.webp";
        $data['section_img45'] = "wp-content/uploads/2022/09/IMG_4038-scaled.webp";
        $data['section_img46'] = "wp-content/uploads/2022/09/IMG_4080-1-scaled.webp";
        $data['section_img47'] = "wp-content/uploads/2022/09/IMG_4087-scaled.webp";

        return view('front/for-indonesia-culture', compact('data'));
    }

    public function for_children_care()
    {
        $data['section_title'] = "Visi";
        $data['section_body'] = "Menjadi program Social Development Officer/BAKTI UNTUK NEGERI dari BB1%MC yang bersifat sosial, non-profit, terpercaya dan<br />berkontribusi membangun anak usia sekolah yang peduli, mandiri, kreatif dan inovatif.";
        $data['section_title2'] = "Misi";
        $data['section_body2'] = "1. Dalam melaksanakan semua kegiatan peduli sosial, anggota Bikers Brotherhood 1% MC selalu dalam semangat dan menjungjung tinggi 5 Azas (Brotherhood, Loyal, Respect, Honor, Pride).
        2. Menyelenggarakan kegiatan sosial kreatif di setiap check point BB 1% MC seluruh Indonesia berbasis penambahan ilmu dan pemanfaatan waktu luang anak sekolah dan putus sekolah dari usia PAUD hingga SMA/SMK sebagai pusat kegiatan.
        3. Membangun kerjasama antar organisasi sosial/komunitas /CSR perusahaan dan unsur masyarakat lain yang memiliki tujuan sama.
        4. Mewujudkan generasi muda yang peduli, mandiri, kreatif dan inovatif melalui komunitas yang berdaya dan bermanfaat.
        5. Mendidik anak-anak bangsa melalui kegiatan pendidikan yang bermanfaat.";

        $data['section_img'] = "wp-content/uploads/2022/09/bfcc-images-001.webp";
        $data['section_img2'] = "wp-content/uploads/2022/09/bfcc-images-002.webp";
        $data['section_img3'] = "wp-content/uploads/2022/09/bfcc-images-003.webp";
        $data['section_img4'] = "wp-content/uploads/2022/09/bfcc-images-004.webp";
        $data['section_img5'] = "wp-content/uploads/2022/09/bfcc-images-005.webp";
        $data['section_img6'] = "wp-content/uploads/2022/09/bfcc-images-006.webp";
        $data['section_img7'] = "wp-content/uploads/2022/09/bfcc-images-007.webp";

        return view('front/for-children-care', compact('data'));
    }

    public function for_rescue_and_disaster()
    {
        $data['section_title'] = "KEDUDUKAN";
        $data['section_body'] = "Kedudukan Brotherhood For Rescue And Disaster adalah suatu Lembaga non Pemerintahan";

        $data['section_img'] = "wp-content/uploads/2022/10/IMG_0957-1024x1024.webp";
        $data['section_title2'] = "TUGAS POKOK";
        $data['section_body2'] = "<li>Melakukan koordinasi dengan pihak terkait dalam penanggulangan kebencanaan.</li>
        <li>Memberikan informasi setiap penyelenggaraan pencarian serta pertolongan kepada masyarakat.</li>
        <li>Menyusun data dan informasi kebencanaan.</li>";

        $data['section_img2'] = "wp-content/uploads/2022/10/IMG_3782-1024x1024.webp";
        $data['section_title3'] = "MISI BFRAD";
        $data['section_body3'] = "<li>Menjungjung tinggi 5 (lima) Azas Bikers Brotherhood 1% MC (Brotherhood, Loyal, Respect, Honour, Pride)</li>
        <li>Menyelenggarakan operasi dalam pencarian serta pertolongan yang efektif dan berstandar nasional demi mewujudkan rasa aman bagi seluruh warga.</li>
        <li>Menyelenggarakan penanggulangan bencana secara terencana.</li>";

        $data['section_title4'] = "VISI BFRAD";
        $data['section_body4'] = "Mewujudkan program Bakti Untuk Negeri dari BB1%MC";

        $data['section_img3'] = "wp-content/uploads/2022/10/IMG_0720-scaled.webp";
        $data['section_img31'] = "wp-content/uploads/2022/10/b8487621-7220-430a-9b7a-816ef1c22665.webp";
        $data['section_img32'] = "wp-content/uploads/2022/10/IMG_0419.webp";
        $data['section_img33'] = "wp-content/uploads/2022/10/IMG_0774-scaled.webp";
        $data['section_img34'] = "wp-content/uploads/2022/10/IMG_0826-scaled.webp";
        $data['section_img35'] = "wp-content/uploads/2022/10/IMG_0974.webp";
        $data['section_img36'] = "wp-content/uploads/2022/10/IMG_1424.webp";
        $data['section_img37'] = "wp-content/uploads/2022/10/IMG_1426.webp";
        $data['section_img38'] = "wp-content/uploads/2022/10/IMG_3799-scaled.webp";
        $data['section_img39'] = "wp-content/uploads/2022/10/260260f0-17d5-463e-ac81-fc8d5506178c.webp";
        $data['section_img4'] = "wp-content/uploads/2022/10/IMG_3849-scaled.webp";
        $data['section_img41'] = "wp-content/uploads/2022/10/7fd40c8f-ae85-424d-a7c2-d0f04f86a67f.webp";
        $data['section_img42'] = "wp-content/uploads/2022/10/fa3553e2-de50-481e-bfb2-49cac59b84f3.webp";

        return view('front/for-rescue-and-disaster', compact('data'));
    }

    public function support22()
    {
        $data['section_title'] = "Support 22 1% MC";
        $data['section_body'] = "Wadah yg d buat oleh BB1%MC , yg merupakan satu kesatuan komitmen dimana kita merasa berkomitmen menjadi saudara.
        Siap menjalankan 3 azas :
        1. Brotherhood
        2. Loyal
        3. Respect
        
        Siap menjalankan 5 program bakti untuk negeri :
        1. BFN (brotherhood for nature)
        2. BFF (brotherhood for faith)
        3. BFIC (brotherhood for indonesian culture)
        4. BFCC (brotherhood for children care)
        5. BFRAD (brotherhood for rescue and Disaster)
        
        Siap mengikuti segala kegiatan Bikers Brotherhood 1% mc dan Mensupport Seluruh kegiatan yang dilakukan oleh BB1%MC baik itu tenaga atau pun pikiran";

        $data['section_img'] = "wp-content/uploads/2022/09/sprt22-image-001.webp";
        $data['section_img1'] = "wp-content/uploads/2022/09/sprt22-image-002.webp";
        $data['section_img2'] = "wp-content/uploads/2022/09/sprt22-image-003.webp";
        $data['section_img3'] = "wp-content/uploads/2022/09/sprt22-image-004.webp";
        $data['section_img4'] = "wp-content/uploads/2022/09/sprt22-image-005.webp";
        $data['section_img5'] = "wp-content/uploads/2022/09/sprt22-image-006.webp";
        $data['section_img6'] = "wp-content/uploads/2022/09/sprt22-image-007.webp";
        $data['section_img7'] = "wp-content/uploads/2022/09/sprt22-image-008.webp";
        $data['section_img8'] = "wp-content/uploads/2022/09/sprt22-image-009.webp";
        $data['section_img9'] = "wp-content/uploads/2022/09/sprt22-image-010.webp";
        $data['section_img10'] = "wp-content/uploads/2022/09/sprt22-image-011.webp";
        $data['section_img11'] = "wp-content/uploads/2022/09/sprt22-image-012.webp";
        $data['section_img12'] = "wp-content/uploads/2022/09/sprt22-image-013.webp";
        $data['section_img13'] = "wp-content/uploads/2022/09/sprt22-image-014.webp";
        $data['section_img14'] = "wp-content/uploads/2022/09/sprt22-image-015.webp";
        $data['section_img15'] = "wp-content/uploads/2022/09/sprt22-image-016.webp";

        return view('front/support22', compact('data'));
    }

    public function our_chapter()
    {
        $data['section_title'] = "CHAPTER";
        $data['section_body'] = "Chapter adalah Perwakilan Bikers Brotherhood 1% MC pada tingkat local suatu daerah yang berkedudukan di wilayah kota/provinsi atau penentuan wilayah berdasarakan keputusan musyawarah Persaudaraan dan diresmikan oleh EL Presidente.";

        return view('front/our-chapter', compact('data'));
    }

    public function blog()
    {
        return view('front/blog');
    }
}
