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

import com.googlecode.genericdao.dao.jpa.GenericDAOImpl;
import com.googlecode.genericdao.search.jpa.JPASearchProcessor;
import com.recipe.rest.entity.RankDO;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Repository;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;

@Repository
public class RankDAOImpl extends GenericDAOImpl<RankDO, Integer> implements RankDAO {

    @Override
    @PersistenceContext(unitName = "recipeRestPersistence")
    @Qualifier(value = "entityManagerFactory")
    public void setEntityManager(EntityManager entityManager) {
        super.setEntityManager(entityManager);
    }

    @Override
    @Autowired
    @Qualifier(value = "searchProcessor")
    public void setSearchProcessor(JPASearchProcessor searchProcessor) {
        super.setSearchProcessor(searchProcessor);
    }

    @Override
    public Long findTotalRanksByRecipeId(Integer recipeId) {
        if (recipeId == null || recipeId < 0) return null;
        Query query = em().createQuery("SELECT count(*) FROM RankDO rank where rank.recipeId=:recipeId and rank.status = 1");
        query.setParameter("recipeId", recipeId);
        return (Long) query.getSingleResult();
    }
}
