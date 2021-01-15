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

 Date: 15/01/2021 10:45:37
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
-- Sequence structure for aduan_disposisi_aduan_dis_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aduan_disposisi_aduan_dis_id_seq";
CREATE SEQUENCE "public"."aduan_disposisi_aduan_dis_id_seq" 
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
-- Sequence structure for disposisi_file_dis_file_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."disposisi_file_dis_file_id_seq";
CREATE SEQUENCE "public"."disposisi_file_dis_file_id_seq" 
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
-- Sequence structure for ref_kewenangan_ref_kew_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ref_kewenangan_ref_kew_id_seq";
CREATE SEQUENCE "public"."ref_kewenangan_ref_kew_id_seq" 
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
  "aduan_tindak_lanjut_by" int4,
  "aduan_tindak_lanjut_at" timestamp(6),
  "aduan_valid" bool,
  "aduan_valid_at" timestamp(6),
  "aduan_valid_by" int4,
  "aduan_invalid" bool,
  "aduan_invalid_at" timestamp(6),
  "aduan_invalid_by" int4,
  "aduan_valid_note" text COLLATE "pg_catalog"."default",
  "aduan_valid_kewenangan" int4,
  "aduan_valid_judul" text COLLATE "pg_catalog"."default",
  "aduan_valid_koordinasi" text COLLATE "pg_catalog"."default",
  "aduan_valid_jenis_bantuan" text COLLATE "pg_catalog"."default",
  "aduan_approved" bool,
  "aduan_approved_by" int4,
  "aduan_approved_at" timestamp(6),
  "aduan_rejected" bool,
  "aduan_rejected_by" int4,
  "aduan_rejected_at" timestamp(6),
  "aduan_rejected_note" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aduan
-- ----------------------------
INSERT INTO "public"."aduan" VALUES (22, 'a shfoaugf afah f
asfoayfo''afa
', NULL, 'asdhaboiufg laisfh ', '9999999999999999', '0865758798', '2021-01-12', 2, '2021-01-12 22:30:31', NULL, NULL, NULL, NULL, 't', '2021-01-12 23:02:50', 1, NULL, NULL, NULL, 'asoausfakfl autf. asf  <br />
\a<br />
aftaf<br />
 af''a<br />
fa<br />
fa', 3, 'a snliaugfasjfa;fs', 'dengan pemerintah pusat aks ai fa', 'asfg asuifasf', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (26, 'asf hau sfy astuas\a
fasfasf
asfasofa''sf', NULL, 'Mohammad Almi Kurniawan', '9999999999999999', '099684746586', '2021-01-14', 1, '2021-01-14 20:57:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdasd', 1, 'asda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (24, 'dkh sf
', NULL, 'atafalf', '9999999999999999', '8979796898456', '2021-01-12', 2, '2021-01-12 23:09:43', NULL, NULL, NULL, NULL, 't', '2021-01-12 23:13:27', 1, NULL, NULL, NULL, 'asf alfja sfasfafac sad aa', 1, 'asfhasf', 'ak sgflag ', 'fiaugfskdjfks.df', 't', 1, '2021-01-14 21:40:14', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (23, 'akjsfafa s/f;as
fafafasfa
f a
sfa', NULL, 'asfalijfg ', '9999999999999999', '089658787979', '2021-01-12', 3, '2021-01-12 23:08:53', NULL, NULL, NULL, NULL, 't', '2021-01-12 23:13:46', 1, NULL, NULL, NULL, 'a duftpasf asf<br />
a fasf;aosfa', 3, 'afk galfiasf ', 'asafaf', 'fa', 't', 1, '2021-01-14 21:44:48', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aduan" VALUES (25, 'alsfhbpasf laijfga
a sasfa ;sfa
s asfasf', NULL, 'Mohammad Almi Kurniawan', '9999999999999999', '098685758768', '2021-01-13', 3, '2021-01-13 20:42:06', NULL, NULL, NULL, NULL, 't', '2021-01-13 20:54:48', 1, NULL, NULL, NULL, 'asfh aisfa jh;asf<br />
as f;satfaf<br />
a sfafsa sf<br />
', 2, 'testing', 'ashf oasf ', 'aisyfa98tf askfasf', 't', 1, '2021-01-14 21:45:01', 't', 1, '2021-01-14 21:42:59', 'lah s;foa yfasf
asfaisuftaisf psf');

-- ----------------------------
-- Table structure for aduan_disposisi
-- ----------------------------
DROP TABLE IF EXISTS "public"."aduan_disposisi";
CREATE TABLE "public"."aduan_disposisi" (
  "aduan_dis_id" int4 NOT NULL DEFAULT nextval('aduan_disposisi_aduan_dis_id_seq'::regclass),
  "aduan_dis_aduan_id" int4,
  "aduan_dis_dinas_id" int4,
  "aduan_dis_tindak_lanjut_is" bool,
  "aduan_dis_tindak_lanjut_at" timestamp(6),
  "aduan_dis_tindak_lanjut_by" int4,
  "aduan_dis_tindak_lanjut_note" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aduan_disposisi
-- ----------------------------
INSERT INTO "public"."aduan_disposisi" VALUES (11, 24, 1, NULL, NULL, NULL, NULL);

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
  "history_created_by" int4
)
;

-- ----------------------------
-- Records of aduan_history
-- ----------------------------
INSERT INTO "public"."aduan_history" VALUES (58, 22, 1, 'Laporan Diterima CS', '2021-01-12 22:30:31', NULL);
INSERT INTO "public"."aduan_history" VALUES (60, 22, 3, 'Disposisi ke Dinas', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (61, 22, 4, 'Laporan Valid', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (62, 22, 5, 'Konfirmasi eksekusi', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (59, 22, 2, 'Proses validasi oleh tim', '2021-01-12 23:02:50', NULL);
INSERT INTO "public"."aduan_history" VALUES (63, 23, 1, 'Laporan Diterima CS', '2021-01-12 23:08:53', NULL);
INSERT INTO "public"."aduan_history" VALUES (66, 23, 4, 'Laporan Valid', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (67, 23, 5, 'Konfirmasi eksekusi', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (68, 24, 1, 'Laporan Diterima CS', '2021-01-12 23:09:43', NULL);
INSERT INTO "public"."aduan_history" VALUES (70, 24, 3, 'Disposisi ke Dinas', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (71, 24, 4, 'Laporan Valid', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (72, 24, 5, 'Konfirmasi eksekusi', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (69, 24, 2, 'Proses validasi oleh tim', '2021-01-12 23:13:27', NULL);
INSERT INTO "public"."aduan_history" VALUES (64, 23, 2, 'Proses validasi oleh tim', '2021-01-12 23:13:46', NULL);
INSERT INTO "public"."aduan_history" VALUES (73, 25, 1, 'Laporan Diterima CS', '2021-01-13 20:42:06', NULL);
INSERT INTO "public"."aduan_history" VALUES (76, 25, 4, 'Laporan Valid', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (77, 25, 5, 'Konfirmasi eksekusi', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (74, 25, 2, 'Proses validasi oleh tim', '2021-01-13 20:54:48', NULL);
INSERT INTO "public"."aduan_history" VALUES (78, 26, 1, 'Laporan Diterima CS', '2021-01-14 20:57:32', NULL);
INSERT INTO "public"."aduan_history" VALUES (79, 26, 2, 'Proses validasi oleh tim', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (80, 26, 3, 'Disposisi ke Dinas', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (81, 26, 4, 'Laporan Valid', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (82, 26, 5, 'Konfirmasi eksekusi', NULL, NULL);
INSERT INTO "public"."aduan_history" VALUES (65, 23, 3, 'Disposisi ke Dinas', '2021-01-14 21:44:49', NULL);
INSERT INTO "public"."aduan_history" VALUES (75, 25, 3, 'Disposisi ke Dinas', '2021-01-14 21:45:01', NULL);

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
-- Table structure for ref_kewenangan
-- ----------------------------
DROP TABLE IF EXISTS "public"."ref_kewenangan";
CREATE TABLE "public"."ref_kewenangan" (
  "ref_kew_id" int4 NOT NULL DEFAULT nextval('ref_kewenangan_ref_kew_id_seq'::regclass),
  "ref_kew_label" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of ref_kewenangan
-- ----------------------------
INSERT INTO "public"."ref_kewenangan" VALUES (1, 'Kabupaten');
INSERT INTO "public"."ref_kewenangan" VALUES (2, 'Provinsi');
INSERT INTO "public"."ref_kewenangan" VALUES (3, 'Pusat');

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
INSERT INTO "public"."ref_status" VALUES (99, 'Tidak Valid Oleh Tim');
INSERT INTO "public"."ref_status" VALUES (100, 'Tidak Valid Oleh Dinas');
INSERT INTO "public"."ref_status" VALUES (3, 'Disposisi ke Dinas');
INSERT INTO "public"."ref_status" VALUES (4, 'Laporan Valid');
INSERT INTO "public"."ref_status" VALUES (5, 'Konfirmasi Eksekusi');

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
-- Table structure for tindak_lanjut_file
-- ----------------------------
DROP TABLE IF EXISTS "public"."tindak_lanjut_file";
CREATE TABLE "public"."tindak_lanjut_file" (
  "dis_file_id" int4 NOT NULL DEFAULT nextval('disposisi_file_dis_file_id_seq'::regclass),
  "dis_file_dis_id" int4,
  "dis_file_file" varchar COLLATE "pg_catalog"."default",
  "dis_file_created_at" timestamp(6),
  "dis_file_created_by" int4
)
;

-- ----------------------------
-- Records of tindak_lanjut_file
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
  "user_member_id" int4,
  "user_dinas_id" int4
)
;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'f', '2020-09-16 10:34:30.089515', 0, NULL);
INSERT INTO "public"."user" VALUES (26, 'yus', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, NULL, '2021-01-07 15:06:36.726475', NULL, NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_aduan_id_seq"
OWNED BY "public"."aduan"."aduan_id";
SELECT setval('"public"."aduan_aduan_id_seq"', 27, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_disposisi_aduan_dis_id_seq"
OWNED BY "public"."aduan_disposisi"."aduan_dis_id";
SELECT setval('"public"."aduan_disposisi_aduan_dis_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_file_aduan_file_id_seq"
OWNED BY "public"."aduan_file"."aduan_file_id";
SELECT setval('"public"."aduan_file_aduan_file_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."aduan_history_history_id_seq"
OWNED BY "public"."aduan_history"."history_id";
SELECT setval('"public"."aduan_history_history_id_seq"', 83, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."disposisi_file_dis_file_id_seq"
OWNED BY "public"."tindak_lanjut_file"."dis_file_id";
SELECT setval('"public"."disposisi_file_dis_file_id_seq"', 2, false);

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
ALTER SEQUENCE "public"."ref_kewenangan_ref_kew_id_seq"
OWNED BY "public"."ref_kewenangan"."ref_kew_id";
SELECT setval('"public"."ref_kewenangan_ref_kew_id_seq"', 4, true);

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
-- Primary Key structure for table aduan_disposisi
-- ----------------------------
ALTER TABLE "public"."aduan_disposisi" ADD CONSTRAINT "aduan_disposisi_pkey" PRIMARY KEY ("aduan_dis_id");

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
-- Primary Key structure for table ref_kewenangan
-- ----------------------------
ALTER TABLE "public"."ref_kewenangan" ADD CONSTRAINT "ref_kewenangan_pkey" PRIMARY KEY ("ref_kew_id");

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
