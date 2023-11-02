#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: PERFUME_BRAND
#------------------------------------------------------------

CREATE TABLE PERFUME_BRAND(
        id_brand   Int  Auto_increment  NOT NULL ,
        name_brand Char (50) NOT NULL
	,CONSTRAINT PERFUME_BRAND_PK PRIMARY KEY (id_brand)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PERFUME_NAME
#------------------------------------------------------------

CREATE TABLE PERFUME_NAME(
        id_perfume     Int  Auto_increment  NOT NULL ,
        name_perfume   Char (50) NOT NULL ,
        gender_perfume Char (15) NOT NULL ,
        price_perfume  Varchar (15) NOT NULL ,
        id_brand       Int NOT NULL
	,CONSTRAINT PERFUME_NAME_PK PRIMARY KEY (id_perfume)

	,CONSTRAINT PERFUME_NAME_PERFUME_BRAND_FK FOREIGN KEY (id_brand) REFERENCES PERFUME_BRAND(id_brand)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GENERAL_ORDER
#------------------------------------------------------------

CREATE TABLE GENERAL_ORDER(
        id_gene_order       Int  Auto_increment  NOT NULL ,
        name_gene_order     Char (50) NOT NULL ,
        price_gene_order    Varchar (500) NOT NULL ,
        date_gene_order     Char (25) NOT NULL ,
        quantity_gene_order Varchar (25) NOT NULL
	,CONSTRAINT GENERAL_ORDER_PK PRIMARY KEY (id_gene_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: INDIVIDUAL_ORDER
#------------------------------------------------------------

CREATE TABLE INDIVIDUAL_ORDER(
        id_indi_order       Int  Auto_increment  NOT NULL ,
        name_indi_order     Char (50) NOT NULL ,
        price_indi_order    Varchar (500) NOT NULL ,
        quantity_indi_order Char (200) NOT NULL ,
        date_indi_order     Char (25) NOT NULL ,
        id_gene_order       Int
	,CONSTRAINT INDIVIDUAL_ORDER_PK PRIMARY KEY (id_indi_order)

	,CONSTRAINT INDIVIDUAL_ORDER_GENERAL_ORDER_FK FOREIGN KEY (id_gene_order) REFERENCES GENERAL_ORDER(id_gene_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: POSSESSES
#------------------------------------------------------------

CREATE TABLE POSSESSES(
        id_indi_order Int NOT NULL ,
        id_perfume    Int NOT NULL
	,CONSTRAINT POSSESSES_PK PRIMARY KEY (id_indi_order,id_perfume)

	,CONSTRAINT POSSESSES_INDIVIDUAL_ORDER_FK FOREIGN KEY (id_indi_order) REFERENCES INDIVIDUAL_ORDER(id_indi_order)
	,CONSTRAINT POSSESSES_PERFUME_NAME0_FK FOREIGN KEY (id_perfume) REFERENCES PERFUME_NAME(id_perfume)
)ENGINE=InnoDB;

