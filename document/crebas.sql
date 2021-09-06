/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     9/3/2021 11:48:51 AM                         */
/*==============================================================*/


drop table if exists CHITIET;

drop table if exists GOPY;

drop table if exists HINHANH;

drop table if exists HOATDONG;

drop table if exists QUYENGOP;

drop table if exists NGUOITHAMGIA;

drop table if exists TAIKHOAN;

drop table if exists TUTHIEN;

drop table if exists NGUOIDUNG;

/*==============================================================*/
/* Table: CHITIET                                               */
/*==============================================================*/
create table CHITIET
(
   ID_CHITIET           int not null auto_increment,
   ID_HOATDONG          int,
   TEN                  varchar(1000),
   SOTIEN               bigint,
   CHUNGTU              varchar(500),
   primary key (ID_CHITIET)
);

/*==============================================================*/
/* Table: GOPY                                                  */
/*==============================================================*/
create table GOPY
(
   ID_GOPY              int not null auto_increment,
   HOTEN                varchar(500),
   EMAIL                varchar(500),
   NOIDUNG              text,
   THOIGIAN             datetime,
   HINHANH_1            varchar(500),
   HINHANH_2            varchar(500),
   HINHANH_3            varchar(500),
   HINHANH_4            varchar(500),
   HINHANH_5            varchar(500),
   primary key (ID_GOPY)
);

/*==============================================================*/
/* Table: HINHANH                                               */
/*==============================================================*/
create table HINHANH
(
   ID_HINHANH           int not null auto_increment,
   ID_HOATDONG          int,
   PATH                 varchar(500),
   THOIGIAN             datetime,
   primary key (ID_HINHANH)
);

/*==============================================================*/
/* Table: HOATDONG                                              */
/*==============================================================*/
create table HOATDONG
(
   ID_HOATDONG          int not null auto_increment,
   ID_TUTHIEN           int,
   ID_NGUOIDUNG         int,
   TEN                  varchar(1000),
   BATDAU               date,
   KETTHUC              date,
   MOTA                 text,
   primary key (ID_HOATDONG)
);

/*==============================================================*/
/* Table: NGUOIDUNG                                             */
/*==============================================================*/
create table NGUOIDUNG
(
   ID_NGUOIDUNG         int not null auto_increment,
   NGU_ID_NGUOIDUNG     int,
   HOTEN                varchar(500),
   SDT                  varchar(500),
   EMAIL                varchar(500),
   DIACHI               varchar(1000),
   HINHANH              varchar(600),
   QUYEN                smallint,
   MATKHAU              varchar(500),
   XACTHUC              bool,
   primary key (ID_NGUOIDUNG)
);

/*==============================================================*/
/* Table: NGUOITHAMGIA                                          */
/*==============================================================*/
create table NGUOITHAMGIA
(
   MA_THAMGIA           int not null auto_increment,
   HOTEN                varchar(500),
   SDT                  varchar(500),
   EMAIL                varchar(500),
   GHICHU               text,
   HINHANH              varchar(600),
   NGAYTAO              datetime,
   primary key (MA_THAMGIA)
);

/*==============================================================*/
/* Table: QUYENGOP                                              */
/*==============================================================*/
create table QUYENGOP
(
   ID_QUYENGOP          int not null auto_increment,
   MA_THAMGIA           int,
   ID_TUTHIEN           int,
   TAIKHOAN             varchar(500),
   TEN                  varchar(1000),
   THOIGIAN             datetime,
   SOTIEN               bigint,
   XACTHUC              bool,
   HINHANH              varchar(600),
   NGAYTAO              datetime,
   MAGIAODICH           varchar(500),
   NOIDUNG              text,
   primary key (ID_QUYENGOP)
);

/*==============================================================*/
/* Table: TAIKHOAN                                              */
/*==============================================================*/
create table TAIKHOAN
(
   ID_TUTHIEN           int not null,
   MA_TAIKHOAN          varchar(500) not null,
   HOTEN                varchar(500),
   NGANHANG             varchar(500),
   primary key (ID_TUTHIEN, MA_TAIKHOAN)
);

/*==============================================================*/
/* Table: TUTHIEN                                               */
/*==============================================================*/
create table TUTHIEN
(
   ID_TUTHIEN           int not null auto_increment,
   ID_NGUOIDUNG         int null,
   HINHANH              varchar(600),
   TENQUY               varchar(500),
   BATDAU               date,
   KETTHUC              date,
   MOTA                 text,
   SDT                  varchar(500),
   PHUTRACH             varchar(200),
   DIACHI               varchar(1000),
   GHICHU               text,
   XACTHUC              bool,
   NGAYTAO              datetime,
   primary key (ID_TUTHIEN)
);
ALTER TABLE CHITIET AUTO_INCREMENT = 1000000000;

ALTER TABLE HINHANH AUTO_INCREMENT = 1000000000;

ALTER TABLE HOATDONG AUTO_INCREMENT = 1000000000;

ALTER TABLE NGUOIDUNG AUTO_INCREMENT = 1000000000;

ALTER TABLE QUYENGOP AUTO_INCREMENT = 1000000000;

ALTER TABLE TUTHIEN AUTO_INCREMENT = 1000000000;

ALTER TABLE NGUOITHAMGIA AUTO_INCREMENT = 1000000000;

alter table CHITIET add constraint FK_FK_HD_CT foreign key (ID_HOATDONG)
      references HOATDONG (ID_HOATDONG) on delete restrict on update restrict;

alter table HINHANH add constraint FK_FK_HD_HA foreign key (ID_HOATDONG)
      references HOATDONG (ID_HOATDONG) on delete restrict on update restrict;

alter table HOATDONG add constraint FK_FK_ND_HD foreign key (ID_NGUOIDUNG)
      references NGUOIDUNG (ID_NGUOIDUNG) on delete restrict on update restrict;

alter table HOATDONG add constraint FK_FK_TT_HD foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

alter table NGUOIDUNG add constraint FK_FK_ND_CND foreign key (NGU_ID_NGUOIDUNG)
      references NGUOIDUNG (ID_NGUOIDUNG) on delete restrict on update restrict;

alter table QUYENGOP add constraint FK_FK_TG_QG foreign key (MA_THAMGIA)
      references NGUOITHAMGIA (MA_THAMGIA) on delete restrict on update restrict;

alter table QUYENGOP add constraint FK_FK_TT_QG foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

alter table TAIKHOAN add constraint FK_FK_TT_TK foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

alter table TUTHIEN add constraint FK_FK_ND_TT foreign key (ID_NGUOIDUNG)
      references NGUOIDUNG (ID_NGUOIDUNG) on delete restrict on update restrict;
      
delimiter //
CREATE FUNCTION `MY_DECR`(param TEXT CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci) RETURNS text CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci
Begin
	DECLARE keyString VARCHAR( 20 ) DEFAULT "Guuai123$";
	DECLARE keyCode INT DEFAULT 512;
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
	 BEGIN
		return param;
	 END;
  return AES_DECRYPT(UNHEX(param), UNHEX(SHA2(keyString, keyCode)));
End;
delimiter //
CREATE FUNCTION `MY_ENCR`(param VARCHAR(255) CHARACTER SET utf8mb4) RETURNS varchar(255) CHARSET latin1
Begin
	DECLARE keyString VARCHAR( 20 ) DEFAULT "Guuai123$";
	DECLARE keyCode INT DEFAULT 512;
  return HEX(AES_ENCRYPT(param, UNHEX(SHA2(keyString, keyCode))));
End
