--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aduan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aduan (
    aduan_id integer NOT NULL,
    aduan_pesan text,
    aduan_member_id integer,
    aduan_nama character varying,
    aduan_nik character varying,
    aduan_telp character varying(255),
    aduan_date date,
    aduan_status integer,
    aduan_created_at timestamp(6) without time zone,
    aduan_created_by integer,
    aduan_tindak_lanjut_is boolean,
    aduan_tindak_lanjut_text text,
    aduan_tindak_lanjut_by integer,
    aduan_tindak_lanjut_at timestamp(6) without time zone,
    aduan_tindak_lanjut_photo character varying(255),
    aduan_disposisi_dinas_id integer,
    aduan_valid boolean,
    aduan_valid_at timestamp without time zone,
    aduan_valid_by integer,
    aduan_invalid boolean,
    aduan_invalid_at timestamp without time zone,
    aduan_invalid_by integer
);


ALTER TABLE public.aduan OWNER TO postgres;

--
-- Name: aduan_aduan_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aduan_aduan_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aduan_aduan_id_seq OWNER TO postgres;

--
-- Name: aduan_aduan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aduan_aduan_id_seq OWNED BY public.aduan.aduan_id;


--
-- Name: aduan_file; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aduan_file (
    aduan_file_id integer NOT NULL,
    aduan_file_aduan_id integer,
    aduan_file_url character varying
);


ALTER TABLE public.aduan_file OWNER TO postgres;

--
-- Name: aduan_file_aduan_file_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aduan_file_aduan_file_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aduan_file_aduan_file_id_seq OWNER TO postgres;

--
-- Name: aduan_file_aduan_file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aduan_file_aduan_file_id_seq OWNED BY public.aduan_file.aduan_file_id;


--
-- Name: aduan_history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aduan_history (
    history_id integer NOT NULL,
    history_aduan_id integer,
    history_status integer,
    history_status_text text,
    history_created_at timestamp(6) without time zone,
    history_created_by integer,
    history_dinas_id integer
);


ALTER TABLE public.aduan_history OWNER TO postgres;

--
-- Name: aduan_history_history_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aduan_history_history_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aduan_history_history_id_seq OWNER TO postgres;

--
-- Name: aduan_history_history_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aduan_history_history_id_seq OWNED BY public.aduan_history.history_id;


--
-- Name: karyawan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.karyawan (
    kar_id integer NOT NULL,
    kar_nama character varying,
    kar_nip character varying(255),
    kar_pangkat character varying(255),
    kar_jabatan character varying(255),
    kar_created_at timestamp(6) without time zone,
    kar_created_by integer,
    kar_visible boolean,
    kar_dinas_id integer
);


ALTER TABLE public.karyawan OWNER TO postgres;

--
-- Name: karyawan_kar_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.karyawan_kar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.karyawan_kar_id_seq OWNER TO postgres;

--
-- Name: karyawan_kar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.karyawan_kar_id_seq OWNED BY public.karyawan.kar_id;


--
-- Name: member; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member (
    member_id integer NOT NULL,
    member_nama_lengkap character varying,
    member_no_telp character varying(255),
    member_created_at timestamp(6) without time zone,
    member_created_by integer,
    member_updated_by integer,
    member_updated_at timestamp(6) without time zone,
    member_visible boolean DEFAULT true,
    member_no_ktp character varying(255)
);


ALTER TABLE public.member OWNER TO postgres;

--
-- Name: member_member_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.member_member_id_seq OWNER TO postgres;

--
-- Name: member_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_member_id_seq OWNED BY public.member.member_id;


--
-- Name: ref_dinas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ref_dinas (
    dinas_id integer NOT NULL,
    dinas_nama character varying,
    dinas_created_at timestamp(6) without time zone,
    dinas_created_by integer
);


ALTER TABLE public.ref_dinas OWNER TO postgres;

--
-- Name: ref_dinas_dinas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ref_dinas_dinas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ref_dinas_dinas_id_seq OWNER TO postgres;

--
-- Name: ref_dinas_dinas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ref_dinas_dinas_id_seq OWNED BY public.ref_dinas.dinas_id;


--
-- Name: ref_group_akses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ref_group_akses (
    ref_group_akses_id integer NOT NULL,
    ref_group_akses_label character varying(255)
);


ALTER TABLE public.ref_group_akses OWNER TO postgres;

--
-- Name: ref_group_akses_ref_group_akses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ref_group_akses_ref_group_akses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.ref_group_akses_ref_group_akses_id_seq OWNER TO postgres;

--
-- Name: ref_group_akses_ref_group_akses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ref_group_akses_ref_group_akses_id_seq OWNED BY public.ref_group_akses.ref_group_akses_id;


--
-- Name: ref_modul_akses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ref_modul_akses (
    ref_modul_akses_id integer NOT NULL,
    ref_modul_akses_label character varying(255),
    ref_modul_akses_group_id integer
);


ALTER TABLE public.ref_modul_akses OWNER TO postgres;

--
-- Name: ref_modul_akses_ref_modul_akses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ref_modul_akses_ref_modul_akses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.ref_modul_akses_ref_modul_akses_id_seq OWNER TO postgres;

--
-- Name: ref_modul_akses_ref_modul_akses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ref_modul_akses_ref_modul_akses_id_seq OWNED BY public.ref_modul_akses.ref_modul_akses_id;


--
-- Name: ref_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ref_status (
    status_id integer NOT NULL,
    status_label character varying
);


ALTER TABLE public.ref_status OWNER TO postgres;

--
-- Name: ref_status_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ref_status_status_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ref_status_status_id_seq OWNER TO postgres;

--
-- Name: ref_status_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ref_status_status_id_seq OWNED BY public.ref_status.status_id;


--
-- Name: ref_user_akses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ref_user_akses (
    ref_user_akses_id integer NOT NULL,
    ref_user_akses_user_id integer,
    ref_user_akses_group_id integer
);


ALTER TABLE public.ref_user_akses OWNER TO postgres;

--
-- Name: ref_user_akses_ref_user_akses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ref_user_akses_ref_user_akses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.ref_user_akses_ref_user_akses_id_seq OWNER TO postgres;

--
-- Name: ref_user_akses_ref_user_akses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ref_user_akses_ref_user_akses_id_seq OWNED BY public.ref_user_akses.ref_user_akses_id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."user" (
    user_id integer NOT NULL,
    user_name character varying,
    user_password character varying(255),
    user_kar_id integer,
    user_disable boolean,
    user_created_at timestamp(6) without time zone,
    user_member_id integer
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Name: user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.user_user_id_seq OWNER TO postgres;

--
-- Name: user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_user_id_seq OWNED BY public."user".user_id;


--
-- Name: aduan aduan_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan ALTER COLUMN aduan_id SET DEFAULT nextval('public.aduan_aduan_id_seq'::regclass);


--
-- Name: aduan_file aduan_file_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan_file ALTER COLUMN aduan_file_id SET DEFAULT nextval('public.aduan_file_aduan_file_id_seq'::regclass);


--
-- Name: aduan_history history_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan_history ALTER COLUMN history_id SET DEFAULT nextval('public.aduan_history_history_id_seq'::regclass);


--
-- Name: karyawan kar_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.karyawan ALTER COLUMN kar_id SET DEFAULT nextval('public.karyawan_kar_id_seq'::regclass);


--
-- Name: member member_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member ALTER COLUMN member_id SET DEFAULT nextval('public.member_member_id_seq'::regclass);


--
-- Name: ref_dinas dinas_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ref_dinas ALTER COLUMN dinas_id SET DEFAULT nextval('public.ref_dinas_dinas_id_seq'::regclass);


--
-- Name: ref_group_akses ref_group_akses_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ref_group_akses ALTER COLUMN ref_group_akses_id SET DEFAULT nextval('public.ref_group_akses_ref_group_akses_id_seq'::regclass);


--
-- Name: ref_modul_akses ref_modul_akses_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ref_modul_akses ALTER COLUMN ref_modul_akses_id SET DEFAULT nextval('public.ref_modul_akses_ref_modul_akses_id_seq'::regclass);


--
-- Name: ref_status status_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ref_status ALTER COLUMN status_id SET DEFAULT nextval('public.ref_status_status_id_seq'::regclass);


--
-- Name: ref_user_akses ref_user_akses_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ref_user_akses ALTER COLUMN ref_user_akses_id SET DEFAULT nextval('public.ref_user_akses_ref_user_akses_id_seq'::regclass);


--
-- Name: user user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user" ALTER COLUMN user_id SET DEFAULT nextval('public.user_user_id_seq'::regclass);


--
-- Data for Name: aduan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aduan (aduan_id, aduan_pesan, aduan_member_id, aduan_nama, aduan_nik, aduan_telp, aduan_date, aduan_status, aduan_created_at, aduan_created_by, aduan_tindak_lanjut_is, aduan_tindak_lanjut_text, aduan_tindak_lanjut_by, aduan_tindak_lanjut_at, aduan_tindak_lanjut_photo, aduan_disposisi_dinas_id, aduan_valid, aduan_valid_at, aduan_valid_by, aduan_invalid, aduan_invalid_at, aduan_invalid_by) FROM stdin;
1	testing	\N	asdsdf	9999999999999999	98766666666	2021-01-05	1	2021-01-05 01:50:20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2	dfadesa	\N	sdf	9999999999999999	0909029301932	2021-01-04	1	2021-01-04 01:52:44	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	Terjadi pohon tumbang di daerah ngasem timur lampu merah. yang menyebabkan kemacetan.	\N	almi kurniawan	9999999999999999	08342342348	2021-01-05	1	2021-01-05 03:05:55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	Terjadi pohon tumbang di daerah ngasem timur lampu merah yang menyebabkan kemacetan.	\N	Mohammad Almi Kurniawan	9999999999999999	08577687767	2021-01-06	1	2021-01-06 02:09:38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	dsfsfd	\N	asdf	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:05:31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	dsfsfd	\N	asdf	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:06:22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	sasfdas	\N	fdas	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:06:42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	sasfdas	\N	fdas	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:07:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	dasfasdf	\N	asdfs	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:10:08	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	dasfasdf	\N	asdfs	3506096106950002	0909029301932	2021-01-06	1	2021-01-06 03:11:57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: aduan_file; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aduan_file (aduan_file_id, aduan_file_aduan_id, aduan_file_url) FROM stdin;
1	10	1609924317_5ffad22e93f89fc9e694.jpg.jpg
\.


--
-- Data for Name: aduan_history; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aduan_history (history_id, history_aduan_id, history_status, history_status_text, history_created_at, history_created_by, history_dinas_id) FROM stdin;
1	1	1	Laporan Diterima CS	2021-01-05 01:50:20	1	\N
2	2	1	Laporan Diterima CS	2021-01-05 01:52:44	1	\N
4	3	2	Proses validasi oleh tim	\N	\N	\N
5	3	3	Laporan valid	\N	\N	\N
6	3	4	Konfirmasi eksekusi	\N	\N	\N
3	3	1	Laporan Diterima CS	2021-01-05 16:07:22	\N	\N
7	4	1	Laporan Diterima CS	2021-01-06 02:09:39	\N	\N
8	4	2	Proses validasi oleh tim	\N	\N	\N
9	4	3	Laporan valid	\N	\N	\N
10	4	4	Konfirmasi eksekusi	\N	\N	\N
11	10	1	Laporan Diterima CS	2021-01-06 03:11:57	\N	\N
12	10	2	Proses validasi oleh tim	\N	\N	\N
13	10	3	Laporan valid	\N	\N	\N
14	10	4	Konfirmasi eksekusi	\N	\N	\N
\.


--
-- Data for Name: karyawan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.karyawan (kar_id, kar_nama, kar_nip, kar_pangkat, kar_jabatan, kar_created_at, kar_created_by, kar_visible, kar_dinas_id) FROM stdin;
\.


--
-- Data for Name: member; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.member (member_id, member_nama_lengkap, member_no_telp, member_created_at, member_created_by, member_updated_by, member_updated_at, member_visible, member_no_ktp) FROM stdin;
\.


--
-- Data for Name: ref_dinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ref_dinas (dinas_id, dinas_nama, dinas_created_at, dinas_created_by) FROM stdin;
\.


--
-- Data for Name: ref_group_akses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ref_group_akses (ref_group_akses_id, ref_group_akses_label) FROM stdin;
\.


--
-- Data for Name: ref_modul_akses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ref_modul_akses (ref_modul_akses_id, ref_modul_akses_label, ref_modul_akses_group_id) FROM stdin;
\.


--
-- Data for Name: ref_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ref_status (status_id, status_label) FROM stdin;
1	Laporan Diterima CS
2	Proses Validasi oleh TIM
3	Laporan Valid
4	Konfirmasi Eksekusi
\.


--
-- Data for Name: ref_user_akses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ref_user_akses (ref_user_akses_id, ref_user_akses_user_id, ref_user_akses_group_id) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (user_id, user_name, user_password, user_kar_id, user_disable, user_created_at, user_member_id) FROM stdin;
1	admin	d033e22ae348aeb5660fc2140aec35850c4da997	0	f	2020-09-16 10:34:30.089515	0
\.


--
-- Name: aduan_aduan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aduan_aduan_id_seq', 10, true);


--
-- Name: aduan_file_aduan_file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aduan_file_aduan_file_id_seq', 1, true);


--
-- Name: aduan_history_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aduan_history_history_id_seq', 14, true);


--
-- Name: karyawan_kar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.karyawan_kar_id_seq', 2, true);


--
-- Name: member_member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_member_id_seq', 37, true);


--
-- Name: ref_dinas_dinas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ref_dinas_dinas_id_seq', 1, false);


--
-- Name: ref_group_akses_ref_group_akses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ref_group_akses_ref_group_akses_id_seq', 13, true);


--
-- Name: ref_modul_akses_ref_modul_akses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ref_modul_akses_ref_modul_akses_id_seq', 41, true);


--
-- Name: ref_status_status_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ref_status_status_id_seq', 4, true);


--
-- Name: ref_user_akses_ref_user_akses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ref_user_akses_ref_user_akses_id_seq', 33, true);


--
-- Name: user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_user_id_seq', 25, true);


--
-- Name: aduan_file aduan_file_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan_file
    ADD CONSTRAINT aduan_file_pkey PRIMARY KEY (aduan_file_id);


--
-- Name: aduan_history aduan_history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan_history
    ADD CONSTRAINT aduan_history_pkey PRIMARY KEY (history_id);


--
-- Name: aduan aduan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aduan
    ADD CONSTRAINT aduan_pkey PRIMARY KEY (aduan_id);


--
-- Name: karyawan karyawan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.karyawan
    ADD CONSTRAINT karyawan_pkey PRIMARY KEY (kar_id);


--
-- Name: member member_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member
    ADD CONSTRAINT memb