/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/12/15.
 */
package com.recipe.rest.common.enums;

import lombok.Getter;

public enum StatusEnum {

    DELETED(0, "Deleted"),
    ACTIVE(1, "Active"),
    DEACTIVATED(2, "Deactivated");

    @Getter
    private int id;

    @Getter
    private final String name;

    StatusEnum(int id, String name) {
        this.id = id;
        this.name = name;
    }
}
