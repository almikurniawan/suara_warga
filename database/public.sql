/*
 Navicat Premium Data Transfer

 Source Server         : localhost postgres
 Source Server Type    : PostgreSQL
 Source Server Version : 100005
 Source Host           : localhost:5432
 Source Catalog        : suara_warga
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100005
 File Encoding         : 65001

 Date: 08/01/2021 09:06:05
*/


-- ----------------------------
-- Sequence structure for aduan_aduan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aduan_aduan_id_seq";
CREATE SEQUENCE "public"."aduan_aduan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for aduan_file_aduan_file_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aduan_file_aduan_file_id_seq";
CREATE SEQUENCE "public"."aduan_file_aduan_file_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for aduan_history_history_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aduan_history_history_id_seq";
CREATE SEQUENCE "public"."aduan_history_history_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for karyawan_kar_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."karyawan_kar_id_seq";
CREATE SEQUENCE "public"."karyawan_kar_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for member_member_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."member_member_id_seq";
CREATE SEQUENCE "public"."member_member_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ref_dinas_dinas_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_dinas_dinas_id_seq";
CREATE SEQUENCE "public"."ref_dinas_dinas_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ref_group_akses_ref_group_akses_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_group_akses_ref_group_akses_id_seq";
CREATE SEQUENCE "public"."ref_group_akses_ref_group_akses_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ref_modul_akses_ref_modul_akses_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_modul_akses_ref_modul_akses_id_seq";
CREATE SEQUENCE "public"."ref_modul_akses_ref_modul_akses_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ref_status_status_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_status_status_id_seq";
CREATE SEQUENCE "public"."ref_status_status_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ref_user_akses_ref_user_akses_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_user_akses_ref_user_akses_id_seq";
CREATE SEQUENCE "public"."ref_user_akses_ref_user_akses_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_user_id_seq";
CREATE SEQUENCE "public"."user_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for aduan
-- ----------------------------
DROP TABLE IF EXISTS "public"."aduan";
CREATE TABLE "public"."aduan" (
  "aduan_id" int4 NOT NULL DEFAULT nextval('aduan_aduan_id_seq'::regclass),
  "aduan_pesan" text COLLATE "pg_catalog"."default",
  "aduan_member_id" int4,
  "aduan_nama" varchar COLLATE "pg_catalog"."default",
  "aduan_nik" varchar COLLATE "pg_catalog"."default",
  "aduan_telp" varchar(255) COLLATE "pg_catalog"."default",
  "aduan_date" date,
  "aduan_status" int4,
  "aduan_created_at" timestamp(6),
  "aduan_created_by" int4,
  "aduan_tindak_lanjut_is" bool,
  "aduan_tindak_lanjut_text" text COLLATE "pg_catalog"."default",
  "aduan_tindak_lanjut_by" int4,
  "aduan_tindak_lanjut_at" timestamp(6),
  "aduan_tindak_lanjut_photo" varchar(255) COLLATE "pg_catalog"."default",
  "aduan_disposisi_dinas_id" int4,
  "aduan_valid" bool,
  "aduan_valid_at" timestamp(6),
  "aduan_valid_by" int4,
  "aduan_invalid" bool,
  "aduan_invalid_at" timestamp(6),
  "aduan_invalid_by" int4
)
;

-- ----------------------------
-- Records of aduan
-- ----------------------------
INSERT INTO "public"."aduan" VALUES (3, 'Terjadi pohon tumbang di daerah ngasem timur lampu merah. yang menyebabkan kemacetan.', NULL, 'almi kurniawan', '9999999999999999', '08342342348', '2021-01-05', 1, '2021-01-05 03:05:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (5, 'dsfsfd', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:05:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (6, 'dsfsfd', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:06:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (7, 'sasfdas', NULL, 'fdas', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:06:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (8, 'sasfdas', NULL, 'fdas', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:07:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (9, 'dasfasdf', NULL, 'asdfs', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:10:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (10, 'dasfasdf', NULL, 'asdfs', '3506096106950002', '0909029301932', '2021-01-06', 1, '2021-01-06 03:11:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (12, 'asdfasdf', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 1, '2021-01-07 02:19:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (11, 'adffds', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 2, '2021-01-07 01:39:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', '2021-01-07 02:25:18', 1, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (13, 'asdfasdf', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 1, '2021-01-07 02:25:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (14, 'fagdsf', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 1, '2021-01-07 02:25:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (15, 'sdfasdf', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 1, '2021-01-07 02:26:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (16, 'DFDSF', NULL, 'asdf', '3506096106950002', '0909029301932', '2021-01-07', 1, '2021-01-07 02:28:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (1, 'testing', NULL, 'asdsdf', '9999999999999999', '98766666666', '2021-01-05', 2, '2021-01-05 01:50:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', '2021-01-07 02:31:52', 1, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (2, 'dfadesa', NULL, 'sdf', '9999999999999999', '0909029301932', '2021-01-04', 99, '2021-01-04 01:52:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', '2021-01-07 02:34:23', 1);
INSERT INTO "public"."aduan" VALUES (4, 'Terjadi pohon tumbang di daerah ngasem timur lampu merah yang menyebabkan kemacetan.', NULL, 'Mohammad Almi Kurniawan', '9999999999999999', '08577687767', '2021-01-06', 2, '2021-01-06 02:09:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', '2021-01-07 02:51:59', 1, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (17, 'Telah terjadi pohon tumbang di daerah ngasem timur lampu merah', NULL, 'Mohammad Almi Kurniawan', '9999999999999999', '0864234237', '2021-01-07', 2, '2021-01-07 03:34:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', '2021-01-07 03:35:57', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for aduan_file
-- ----------------------------
DROP TABLE IF EXISTS "public"."aduan_file";
CREATE TABLE "public"."aduan_file" (
  "aduan_file_id" int4 NOT NULL DEFAULT nextval('aduan_file_aduan_file_id_seq'::regclass),
  "aduan_file_aduan_id" int4,
  "aduan_file_url" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aduan_file
-- ----------------------------
INSERT INTO "public"."aduan_file" VALUES (1, 10, '1609924317_5ffad22e93f89fc9e694.jpg.jpg');
INSERT INTO "public"."aduan_file" VALUES (2, 11, '1610005153_f54f24621000d53af1f2.jpg.jpg');
INSERT INTO "public"."aduan_file" VALUES (3, 16, '1610008100_14ea1ab65e21e719a0a3.png');
INSERT INTO "public"."aduan_file" VALUES (4, 16, '1610008100_fb0f981fe84cbd20513d.png');
INSERT INTO "public"."aduan_file" VALUES (5, 17, '1610012065_f309e49dcd073cbcff04.jpg');

-- ----------------------------
-- Table structure for aduan_history
-- ----------------------------
DROP TABLE IF EXISTS "public"."aduan_history";
CREATE TABLE "public"."aduan_history" (
  "history_id" int4 NOT NULL DEFAULT nextval('aduan_history_history_id_seq'::regclass),
  "history_aduan_id" int4,
  "history_status" int4,
  "history_status_text" text COLLATE "pg_catalog"."default",
  "history_created_at" timestamp(6),
  "history_created_by" int4,
  "history_dinas_id" int4
)
;

-- ----------------------------
-- Records of aduan_history
-- ----------------------------
INSERT INTO "public"."aduan_history" VALUES (1, 1, 1, 'Laporan Diterima CS', '2021-01-05 01:50:20', 1, NULL);
INSERT INTO "public"."aduan_history" VALUES (2, 2, 1, 'Laporan Diterima CS', '2021-01-05 01:52:44', 1, NULL);
INSERT INTO "public"."aduan_history" VALUES (4, 3, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (5, 3, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (6, 3, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (3, 3, 1, 'Laporan Diterima CS', '2021-01-05 16:07:22', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (7, 4, 1, 'Laporan Diterima CS', '2021-01-06 02:09:39', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (9, 4, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (10, 4, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (11, 10, 1, 'Laporan Diterima CS', '2021-01-06 03:11:57', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (12, 10, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (13, 10, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (14, 10, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (15, 11, 1, 'Laporan Diterima CS', '2021-01-07 01:39:13', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (18, 11, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (17, 11, 3, 'Laporan valid', '2021-01-07 02:18:49', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (16, 11, 2, 'Proses validasi oleh tim', '2021-01-07 02:25:18', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (19, 13, 1, 'Laporan Diterima CS', '2021-01-07 02:25:19', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (20, 13, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (21, 13, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (22, 13, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (23, 14, 1, 'Laporan Diterima CS', '2021-01-07 02:25:44', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (24, 14, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (25, 14, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (26, 14, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (27, 15, 1, 'Laporan Diterima CS', '2021-01-07 02:26:41', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (28, 15, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (29, 15, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (30, 15, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (31, 16, 1, 'Laporan Diterima CS', '2021-01-07 02:28:20', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (32, 16, 2, 'Proses validasi oleh tim', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (33, 16, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (34, 16, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (8, 4, 2, 'Proses validasi oleh tim', '2021-01-07 02:51:59', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (35, 17, 1, 'Laporan Diterima CS', '2021-01-07 03:34:26', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (37, 17, 3, 'Laporan valid', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (38, 17, 4, 'Konfirmasi eksekusi', NULL, NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (36, 17, 2, 'Proses validasi oleh tim', '2021-01-07 03:35:57', NULL, NULL);

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS "public"."karyawan";
CREATE TABLE "public"."karyawan" (
  "kar_id" int4 NOT NULL DEFAULT nextval('karyawan_kar_id_seq'::regclass),
  "kar_nama" varchar COLLATE "pg_catalog"."default",
  "kar_nip" varchar(255) COLLATE "pg_catalog"."default",
  "kar_pangkat" varchar(255) COLLATE "pg_catalog"."default",
  "kar_jabatan" varchar(255) COLLATE "pg_catalog"."default",
  "kar_created_at" timestamp(6),
  "kar_created_by" int4,
  "kar_visible" bool,
  "kar_dinas_id" int4
)
;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO "public"."karyawan" VALUES (4, 'yusuf', '123123', 'jendral', 'jendral', '2021-01-07 15:06:36.721698', 1, 't', 1);

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS "public"."member";
CREATE TABLE "public"."member" (
  "member_id" int4 NOT NULL DEFAULT nextval('member_member_id_seq'::regclass),
  "member_nama_lengkap" varchar COLLATE "pg_catalog"."default",
  "member_no_telp" varchar(255) COLLATE "pg_catalog"."default",
  "member_created_at" timestamp(6),
  "member_created_by" int4,
  "member_updated_by" int4,
  "member_updated_at" timestamp(6),
  "member_visible" bool DEFAULT true,
  "member_no_ktp" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for ref_dinas
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_dinas";
CREATE TABLE "public"."ref_dinas" (
  "dinas_id" int4 NOT NULL DEFAULT nextval('ref_dinas_dinas_id_seq'::regclass),
  "dinas_nama" varchar COLLATE "pg_catalog"."default",
  "dinas_created_at" timestamp(6),
  "dinas_created_by" int4
)
;

-- ----------------------------
-- Records of ref_dinas
-- ----------------------------
INSERT INTO "public"."ref_dinas" VALUES (1, 'Dinkop', '2021-01-07 14:52:53.358451', 1);
INSERT INTO "public"."ref_dinas" VALUES (2, 'Disperindag', '2021-01-07 15:11:25.939783', 1);

-- ----------------------------
-- Table structure for ref_group_akses
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_group_akses";
CREATE TABLE "public"."ref_group_akses" (
  "ref_group_akses_id" int4 NOT NULL DEFAULT nextval('ref_group_akses_ref_group_akses_id_seq'::regclass),
  "ref_group_akses_label" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of ref_group_akses
-- ----------------------------

-- ----------------------------
-- Table structure for ref_modul_akses
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_modul_akses";
CREATE TABLE "public"."ref_modul_akses" (
  "ref_modul_akses_id" int4 NOT NULL DEFAULT nextval('ref_modul_akses_ref_modul_akses_id_seq'::regclass),
  "ref_modul_akses_label" varchar(255) COLLATE "pg_catalog"."default",
  "ref_modul_akses_group_id" int4
)
;

-- ----------------------------
-- Records of ref_modul_akses
-- ----------------------------

-- ----------------------------
-- Table structure for ref_status
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_status";
CREATE TABLE "public"."ref_status" (
  "status_id" int4 NOT NULL DEFAULT nextval('ref_status_status_id_seq'::regclass),
  "status_label" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of ref_status
-- ----------------------------
INSERT INTO "public"."ref_status" VALUES (1, 'Laporan Diterima CS');
INSERT INTO "public"."ref_status" VALUES (2, 'Proses Validasi oleh TIM');
INSERT INTO "public"."ref_status" VALUES (3, 'Laporan Valid');
INSERT INTO "public"."ref_status" VALUES (4, 'Konfirmasi Eksekusi');
INSERT INTO "public"."ref_status" VALUES (99, 'Tidak Valid Oleh Tim');
INSERT INTO "public"."ref_status" VALUES (100, 'Tidak Valid Oleh Dinas');

-- ----------------------------
-- Table structure for ref_user_akses
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_user_akses";
CREATE TABLE "public"."ref_user_akses" (
  "ref_user_akses_id" int4 NOT NULL DEFAULT nextval('ref_user_akses_ref_user_akses_id_seq'::regclass),
  "ref_user_akses_user_id" int4,
  "ref_user_akses_group_id" int4
)
;

-- ----------------------------
-- Records of ref_user_akses
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "public"."user";
CREATE TABLE "public"."user" (
  "user_id" int4 NOT NULL DEFAULT nextval('user_user_id_seq'::regclass),
  "user_name" varchar COLLATE "pg_catalog"."default",
  "user_password" varchar(255) COLLATE "pg_catalog"."default",
  "user_kar_id" int4,
  "user_disable" bool,
  "user_created_at" timestamp(6),
  "user_member_id" int4
)
;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'f', '2020-09-16 10:34:30.089515', 0);
INSERT INTO "public"."user" VALUES (26, 'yus', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, NULL, '2021-01-07 15:06:36.726475', NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_aduan_id_seq"
OWNED BY "public"."aduan"."aduan_id";
SELECT setval('"public"."aduan_aduan_id_seq"', 18, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_file_aduan_file_id_seq"
OWNED BY "public"."aduan_file"."aduan_file_id";
SELECT setval('"public"."aduan_file_aduan_file_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_history_history_id_seq"
OWNED BY "public"."aduan_history"."history_id";
SELECT setval('"public"."aduan_history_history_id_seq"', 39, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."karyawan_kar_id_seq"
OWNED BY "public"."karyawan"."kar_id";
SELECT setval('"public"."karyawan_kar_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."member_member_id_seq"
OWNED BY "public"."member"."member_id";
SELECT setval('"public"."member_member_id_seq"', 38, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ref_dinas_dinas_id_seq"
OWNED BY "public"."ref_dinas"."dinas_id";
SELECT setval('"public"."ref_dinas_dinas_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ref_group_akses_ref_group_akses_id_seq"
OWNED BY "public"."ref_group_akses"."ref_group_akses_id";
SELECT setval('"public"."ref_group_akses_ref_group_akses_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ref_modul_akses_ref_modul_akses_id_seq"
OWNED BY "public"."ref_modul_akses"."ref_modul_akses_id";
SELECT setval('"public"."ref_modul_akses_ref_modul_akses_id_seq"', 42, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ref_status_status_id_seq"
OWNED BY "public"."ref_status"."status_id";
SELECT setval('"public"."ref_status_status_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ref_user_akses_ref_user_akses_id_seq"
OWNED BY "public"."ref_user_akses"."ref_user_akses_id";
SELECT setval('"public"."ref_user_akses_ref_user_akses_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_user_id_seq"
OWNED BY "public"."user"."user_id";
SELECT setval('"public"."user_user_id_seq"', 27, true);

-- ----------------------------
-- Primary Key structure for table aduan
-- ----------------------------
ALTER TABLE "public"."aduan" ADD CONSTRAINT "aduan_pkey" PRIMARY KEY ("aduan_id");

-- ----------------------------
-- Primary Key structure for table aduan_file
-- ----------------------------
ALTER TABLE "public"."aduan_file" ADD CONSTRAINT "aduan_file_pkey" PRIMARY KEY ("aduan_file_id");

-- ----------------------------
-- Primary Key structure for table aduan_history
-- ----------------------------
ALTER TABLE "public"."aduan_history" ADD CONSTRAINT "aduan_history_pkey" PRIMARY KEY ("history_id");

-- ----------------------------
-- Primary Key structure for table karyawan
-- ----------------------------
ALTER TABLE "public"."karyawan" ADD CONSTRAINT "karyawan_pkey" PRIMARY KEY ("kar_id");

-- ----------------------------
-- Primary Key structure for table member
-- ----------------------------
ALTER TABLE "public"."member" ADD CONSTRAINT "member_pkey" PRIMARY KEY ("member_id");

-- ----------------------------
-- Primary Key structure for table ref_dinas
-- ----------------------------
ALTER TABLE "public"."ref_dinas" ADD CONSTRAINT "ref_dinas_pkey" PRIMARY KEY ("dinas_id");

-- ----------------------------
-- Primary Key structure for table ref_group_akses
-- ----------------------------
ALTER TABLE "public"."ref_group_akses" ADD CONSTRAINT "ref_group_akses_pkey" PRIMARY KEY ("ref_group_akses_id");

-- ----------------------------
-- Primary Key structure for table ref_modul_akses
-- ----------------------------
ALTER TABLE "public"."ref_modul_akses" ADD CONSTRAINT "ref_modul_akses_pkey" PRIMARY KEY ("ref_modul_akses_id");

-- ----------------------------
-- Primary Key structure for table ref_status
-- ----------------------------
ALTER TABLE "public"."ref_status" ADD CONSTRAINT "ref_status_pkey" PRIMARY KEY ("status_id");

-- ----------------------------
-- Primary Key structure for table ref_user_akses
-- ----------------------------
ALTER TABLE "public"."ref_user_akses" ADD CONSTRAINT "ref_user_akses_pkey" PRIMARY KEY ("ref_user_akses_id");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_pkey" PRIMARY KEY ("user_id");
