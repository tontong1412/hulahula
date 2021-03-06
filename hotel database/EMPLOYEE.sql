--------------------------------------------------------
--  DDL for Table EMPLOYEE
--------------------------------------------------------

  CREATE TABLE "HULAHULA"."EMPLOYEE" 
   (	"ID" NUMBER, 
	"HIRE_DATE" DATE, 
	"PHONENUMBER" VARCHAR2(20 BYTE), 
	"EMAIL" VARCHAR2(255 BYTE), 
	"SALARY" NUMBER, 
	"DNUMBER" NUMBER, 
	"NAME" VARCHAR2(127 BYTE), 
	"LNAME" VARCHAR2(127 BYTE), 
	"MGR_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
