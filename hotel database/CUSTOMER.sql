--------------------------------------------------------
--  DDL for Table CUSTOMER
--------------------------------------------------------

  CREATE TABLE "HULAHULA"."CUSTOMER" 
   (	"EMAIL" VARCHAR2(50 BYTE), 
	"ADDRESS" VARCHAR2(100 BYTE), 
	"PHONENUMBER" VARCHAR2(50 BYTE), 
	"FIRSTNAME" VARCHAR2(50 BYTE), 
	"LASTNAME" VARCHAR2(50 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
