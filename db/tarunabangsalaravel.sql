DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(255) NOT NULL,
    akses_level VARCHAR(20) NOT NULL,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,

    created_by INT NULL,
    updated_by INT NULL,
    deleted_by INT NULL,

    UNIQUE KEY uk_users_username (username),
    UNIQUE KEY uk_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS jenis_kendaraan;

CREATE TABLE jenis_kendaraan (
    id_jenis_kendaraan INT AUTO_INCREMENT PRIMARY KEY,

    id_user INT NOT NULL,

    nama_jenis_kendaraan VARCHAR(255) NOT NULL,
    keterangan TEXT NULL,

    status_default ENUM('Ya','Tidak') DEFAULT 'Tidak',

    urutan INT NULL,

    durasi_parkir_gratis INT DEFAULT 0,
    durasi_parkir_harian INT DEFAULT 0,

    tarif_perjam INT DEFAULT 0,
    tarif_harian INT DEFAULT 0,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,

    created_by INT NULL,
    updated_by INT NULL,
    deleted_by INT NULL,

    CONSTRAINT fk_jenis_kendaraan_user
        FOREIGN KEY (id_user)
        REFERENCES users(id_user)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS pintu_parkir;

CREATE TABLE pintu_parkir (
    id_pintu_parkir INT AUTO_INCREMENT PRIMARY KEY,

    id_user INT NOT NULL,

    nama_pintu_parkir VARCHAR(255) NOT NULL,
    keterangan TEXT NULL,

    jenis_pintu ENUM('Masuk','Keluar') NOT NULL,

    urutan INT NULL,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,

    created_by INT NULL,
    updated_by INT NULL,
    deleted_by INT NULL,

    CONSTRAINT fk_pintu_parkir_user
        FOREIGN KEY (id_user)
        REFERENCES users(id_user)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS parkir;

CREATE TABLE parkir (
    id_parkir INT AUTO_INCREMENT PRIMARY KEY,

    id_user INT NOT NULL,
    id_jenis_kendaraan INT NOT NULL,

    id_pintu_parkir INT NULL,
    id_pintu_keluar INT NULL,

    nomor_polisi VARCHAR(20) NULL,

    kode_parkir VARCHAR(20) NOT NULL,

    tanggal_masuk DATETIME NOT NULL,
    tanggal_keluar DATETIME NULL,

    durasi_hari INT DEFAULT 0,
    durasi_jam INT DEFAULT 0,
    durasi_menit INT DEFAULT 0,

    harga_harian INT DEFAULT 0,
    harga_perjam INT DEFAULT 0,

    total_bayar INT DEFAULT 0,

    status_bayar ENUM('Menunggu','Sudah') DEFAULT 'Menunggu',

    foto VARCHAR(255) NULL,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,

    created_by INT NULL,
    updated_by INT NULL,
    deleted_by INT NULL,

    UNIQUE KEY uk_parkir_kode (kode_parkir),

    INDEX idx_nomor_polisi (nomor_polisi),
    INDEX idx_tanggal_masuk (tanggal_masuk),

    CONSTRAINT fk_parkir_user
        FOREIGN KEY (id_user)
        REFERENCES users(id_user)
        ON UPDATE CASCADE,

    CONSTRAINT fk_parkir_jenis_kendaraan
        FOREIGN KEY (id_jenis_kendaraan)
        REFERENCES jenis_kendaraan(id_jenis_kendaraan)
        ON UPDATE CASCADE,

    CONSTRAINT fk_parkir_pintu_masuk
        FOREIGN KEY (id_pintu_parkir)
        REFERENCES pintu_parkir(id_pintu_parkir)
        ON UPDATE CASCADE,

    CONSTRAINT fk_parkir_pintu_keluar
        FOREIGN KEY (id_pintu_keluar)
        REFERENCES pintu_parkir(id_pintu_parkir)
        ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

