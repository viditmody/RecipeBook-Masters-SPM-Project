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
 * Created by WLao on 11/11/15.
 */
package com.recipe.rest.dao.rank;

import com.googlecode.genericdao.dao.jpa.GenericDAO;
import com.recipe.rest.entity.RankDO;
import org.springframework.stereotype.Repository;

@Repository
public interface RankDAO extends GenericDAO<RankDO, Integer> {

    public Long findTotalRanksByRecipeId(Integer recipeId);

}
