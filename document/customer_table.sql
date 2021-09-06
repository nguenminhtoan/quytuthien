
drop table if exists chitiet ;

drop table if exists gopy;

drop table if exists hinhanh;

drop table if exists hoatdong;

drop table if exists quyengop;

drop table if exists nguoithamgia;

drop table if exists taikhoan;

drop table if exists tuthien;

drop table if exists nguoidung;

/*==============================================================*/
/* Table: chitiet                                                */
/*==============================================================*/
create table chitiet 
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
create table gopy
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
/* Table: hinhanh                                               */
/*==============================================================*/
create table hinhanh
(
   ID_HINHANH           int not null auto_increment,
   ID_HOATDONG          int,
   PATH                 varchar(500),
   THOIGIAN             datetime,
   primary key (ID_HINHANH)
);

/*==============================================================*/
/* Table: hoatdong                                              */
/*==============================================================*/
create table hoatdong
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
/* Table: nguoidung                                             */
/*==============================================================*/
create table nguoidung
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
/* Table: nguoithamgia                                          */
/*==============================================================*/
create table nguoithamgia
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
/* Table: quyengop                                              */
/*==============================================================*/
create table quyengop
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
create table taikhoan
(
   ID_TUTHIEN           int not null,
   MA_TAIKHOAN          varchar(125) not null,
   HOTEN                varchar(500),
   NGANHANG             varchar(500),
   primary key (ID_TUTHIEN, MA_TAIKHOAN)
);

/*==============================================================*/
/* Table: tuthien                                               */
/*==============================================================*/
create table tuthien
(
   ID_TUTHIEN           int not null auto_increment,
   ID_NGUOIDUNG         int null,
   hinhanh              varchar(600),
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
ALTER TABLE chitiet  AUTO_INCREMENT = 1000000000;

ALTER TABLE hinhanh AUTO_INCREMENT = 1000000000;

ALTER TABLE hoatdong AUTO_INCREMENT = 1000000000;

ALTER TABLE nguoidung AUTO_INCREMENT = 1000000000;

ALTER TABLE quyengop AUTO_INCREMENT = 1000000000;

ALTER TABLE tuthien AUTO_INCREMENT = 1000000000;

ALTER TABLE nguoithamgia AUTO_INCREMENT = 1000000000;

alter table chitiet add constraint FK_FK_HD_CT foreign key (ID_HOATDONG)
      references hoatdong (ID_HOATDONG) on delete restrict on update restrict;

alter table hinhanh add constraint FK_FK_HD_HA foreign key (ID_HOATDONG)
      references hoatdong (ID_HOATDONG) on delete restrict on update restrict;

alter table hoatdong add constraint FK_FK_ND_HD foreign key (ID_NGUOIDUNG)
      references nguoidung (ID_NGUOIDUNG) on delete restrict on update restrict;

alter table hoatdong add constraint FK_FK_TT_HD foreign key (ID_TUTHIEN)
      references tuthien (ID_TUTHIEN) on delete restrict on update restrict;

alter table nguoidung add constraint FK_FK_ND_CND foreign key (NGU_ID_NGUOIDUNG)
      references nguoidung (ID_NGUOIDUNG) on delete restrict on update restrict;

alter table quyengop add constraint FK_FK_TG_QG foreign key (MA_THAMGIA)
      references nguoithamgia (MA_THAMGIA) on delete restrict on update restrict;

alter table quyengop add constraint FK_FK_TT_QG foreign key (ID_TUTHIEN)
      references tuthien (ID_TUTHIEN) on delete restrict on update restrict;

alter table taikhoan add constraint FK_FK_TT_TK foreign key (ID_TUTHIEN)
      references tuthien (ID_TUTHIEN) on delete restrict on update restrict;

alter table tuthien add constraint FK_FK_ND_TT foreign key (ID_NGUOIDUNG)
      references nguoidung (ID_NGUOIDUNG) on delete restrict on update restrict;
      