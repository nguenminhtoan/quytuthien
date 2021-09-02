/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     9/2/2021 11:25:01 AM                         */
/*==============================================================*/


drop table if exists CHITIET;

drop table if exists GOPY;

drop table if exists HINHANH;

drop table if exists HOATDONG;

drop table if exists NGUOIDUNG;

drop table if exists QUYENGOP;

drop table if exists TUTHIEN;

/*==============================================================*/
/* Table: CHITIET                                               */
/*==============================================================*/
create table CHITIET
(
   ID_CHITIET           int not null auto_increment,
   ID_HOATDONG          int,
   TEN                  varchar(1000),
   SOTIEN               int,
   CHUNGTU              varchar(500),
   primary key (ID_CHITIET)
);

/*==============================================================*/
/* Table: GOPY                                                  */
/*==============================================================*/
create table GOPY
(
   ID_GOPY              int not null auto_increment,
   EMAIL                varchar(500),
   NOIDUNG              longtext,
   THOIGIAN             timestamp,
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
   THOIGIAN             timestamp,
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
   MOTA                 longtext,
   primary key (ID_HOATDONG)
);

/*==============================================================*/
/* Table: NGUOIDUNG                                             */
/*==============================================================*/
create table NGUOIDUNG
(
   ID_NGUOIDUNG         int not null auto_increment,
   ID_TUTHIEN           int,
   HOTEN                varchar(500),
   SDT                  varchar(500),
   DIACHI               varchar(1000),
   HINHANH              varchar(600),
   QUYEN                smallint,
   NGAYTAO              timestamp,
   primary key (ID_NGUOIDUNG)
);

/*==============================================================*/
/* Table: QUYENGOP                                              */
/*==============================================================*/
create table QUYENGOP
(
   ID_QUYENGOP          int not null auto_increment,
   ID_TUTHIEN           int,
   TAIKHOAN             varchar(500),
   TEN                  varchar(1000),
   THOIGIAN             timestamp,
   SOTIEN               int,
   SDT                  varchar(500),
   XACTHUC              smallint,
   HINHANH              varchar(600),
   NGAYTAO              timestamp,
   primary key (ID_QUYENGOP)
);

/*==============================================================*/
/* Table: TUTHIEN                                               */
/*==============================================================*/
create table TUTHIEN
(
   ID_TUTHIEN           int not null auto_increment,
   HINHANH              varchar(600),
   PATH                 varchar(500),
   TENQUY               varchar(500),
   BATDAU               date,
   KETTHUC              date,
   MOTA                 longtext,
   TAIKHOAN             varchar(500),
   SDT                  varchar(500),
   PHUTRACH             varchar(200),
   DIACHI               varchar(1000),
   GHICHU               longtext,
   XACTHUC              smallint,
   NGAYTAO              timestamp,
   primary key (ID_TUTHIEN)
);

alter table CHITIET add constraint FK_FK_HD_CT foreign key (ID_HOATDONG)
      references HOATDONG (ID_HOATDONG) on delete restrict on update restrict;

alter table HINHANH add constraint FK_FK_HD_HA foreign key (ID_HOATDONG)
      references HOATDONG (ID_HOATDONG) on delete restrict on update restrict;

alter table HOATDONG add constraint FK_FK_ND_HD foreign key (ID_NGUOIDUNG)
      references NGUOIDUNG (ID_NGUOIDUNG) on delete restrict on update restrict;

alter table HOATDONG add constraint FK_FK_TT_HD foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

alter table NGUOIDUNG add constraint FK_FK_ND_TT foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

alter table QUYENGOP add constraint FK_FK_TT_QG foreign key (ID_TUTHIEN)
      references TUTHIEN (ID_TUTHIEN) on delete restrict on update restrict;

