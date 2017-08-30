CREATE TABLE zrcms_core_site_version (id INT AUTO_INCREMENT NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, themeName VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_site_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, host VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_76D0C290CF2713FD (host), INDEX contentVersionId (contentVersionId), INDEX host (host), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_site_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, host VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_page_container_version (id INT AUTO_INCREMENT NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, keywords VARCHAR(255) NOT NULL, blockVersions LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_page_container_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX contentVersionId (contentVersionId), INDEX siteCmsResourceId (siteCmsResourceId), INDEX path (path), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_page_container_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_container_version (id INT AUTO_INCREMENT NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, blockVersions LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_container_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX contentVersionId (contentVersionId), INDEX siteCmsResourceId (siteCmsResourceId), INDEX path (path), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_container_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_page_template_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX contentVersionId (contentVersionId), INDEX siteCmsResourceId (siteCmsResourceId), INDEX path (path), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_page_template_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_layout_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, themeName VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX contentVersionId (contentVersionId), INDEX themeName (themeName), INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_layout_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_layout_version (id INT AUTO_INCREMENT NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, html LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_redirect_version (id INT AUTO_INCREMENT NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, redirectPath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_redirect_resource (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) DEFAULT NULL, requestPath VARCHAR(255) NOT NULL, INDEX siteCmsResourceId (siteCmsResourceId), INDEX requestPath (requestPath), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE zrcms_core_redirect_resource_publish_history (id INT AUTO_INCREMENT NOT NULL, contentVersionId VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, properties LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', createdDate DATETIME NOT NULL, createdByUserId VARCHAR(255) NOT NULL, createdReason VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, siteCmsResourceId VARCHAR(255) DEFAULT NULL, requestPath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
