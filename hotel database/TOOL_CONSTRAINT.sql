--------------------------------------------------------
--  Constraints for Table TOOL
--------------------------------------------------------

  ALTER TABLE "HULAHULA"."TOOL" ADD CONSTRAINT "TOOL_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HULAHULA"."TOOL" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "HULAHULA"."TOOL" MODIFY ("DEPARTMENT" NOT NULL ENABLE);
  ALTER TABLE "HULAHULA"."TOOL" MODIFY ("ID" NOT NULL ENABLE);