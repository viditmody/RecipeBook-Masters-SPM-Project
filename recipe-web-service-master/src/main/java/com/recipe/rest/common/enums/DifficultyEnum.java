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

public enum DifficultyEnum {

    SUPER_EASY(1, "Super easy"),
    EASY(2, "Easy"),
    MEDIOCRE(3, "Mediocre"),
    HARD(4, "Hard"),
    SUPER_HARD(5, "Super hard");

    @Getter
    private int id;

    @Getter
    private final String name;

    DifficultyEnum(int id, String name) {
        this.id = id;
        this.name = name;
    }
}
