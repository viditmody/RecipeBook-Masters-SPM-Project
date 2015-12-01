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
 * Created by WLao on 10/29/15.
 */
package com.recipe.rest.dao.user;

import com.googlecode.genericdao.dao.jpa.GenericDAOImpl;
import com.googlecode.genericdao.search.jpa.JPASearchProcessor;
import com.recipe.rest.dto.User;
import com.recipe.rest.entity.UserDO;
import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Repository;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;
import java.util.List;

@Repository
public class UserDAOImp extends GenericDAOImpl<UserDO, Integer> implements UserDAO {

    @Override
    @PersistenceContext(unitName="recipeRestPersistence")
    @Qualifier(value="entityManagerFactory")
    public void setEntityManager(EntityManager entityManager) {
        super.setEntityManager(entityManager);
    }

    @Override
    @Autowired
    @Qualifier(value="searchProcessor")
    public void setSearchProcessor(JPASearchProcessor searchProcessor) {
        super.setSearchProcessor(searchProcessor);
    }

    @Override
    public List<UserDO> findByUsername(String username) {
        if (StringUtils.isBlank(username)) return null;
        Query query = em().createQuery("SELECT user FROM UserDO user where user.username=:username");
        query.setParameter("username", username);
        return query.getResultList();
    }
}
