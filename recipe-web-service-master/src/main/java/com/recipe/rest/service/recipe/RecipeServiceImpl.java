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
package com.recipe.rest.service.recipe;

import com.recipe.rest.common.enums.ServiceOperation;
import com.recipe.rest.dao.recipe.RecipeDAO;
import com.recipe.rest.dto.Recipe;
import com.recipe.rest.entity.RecipeDO;
import lombok.Setter;
import org.apache.commons.collections.CollectionUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import javax.ws.rs.WebApplicationException;
import javax.ws.rs.core.Response;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Transactional
@Service
public class RecipeServiceImpl implements RecipeService {
    @Autowired
    @Setter
    private RecipeDAO recipeDAO;

    @Autowired
    @Setter
    private RecipeMapper mapper;

    @Override
    public Recipe findById(Integer id) throws Exception {
        RecipeDO recipeDO = recipeDAO.find(id);
        if (recipeDO == null) throw new WebApplicationException(Response.Status.NOT_FOUND); //TODO move to abstract/base
        Recipe recipeDTO = mapper.mapToDTO(recipeDO, ServiceOperation.GET);
        return recipeDTO;
    }

    @Override
    public Map<String, List<Recipe>> findAll() throws Exception {
        List<RecipeDO> recipeDOList = recipeDAO.findAll();
        List<Recipe> recipeDTOList = mapper.mapToDTO(recipeDOList, ServiceOperation.GET);
        Map<String, List<Recipe>> map = new HashMap<String, List<Recipe>>();
        if (CollectionUtils.isEmpty(recipeDTOList)) return map;
        map.put(getPluralizeJsonRootName(constructJsonRoot(recipeDTOList.get(0).getClass())), recipeDTOList); //TODO move to abstract/base
        return map;
    }

    @Override
    public Recipe add(Recipe recipeDTO) throws Exception {
        //validate DTO
        if (recipeDTO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        recipeDTO.setId(null);
        RecipeDO recipeDO = mapper.mapToDO(recipeDTO, ServiceOperation.ADD);
        recipeDO = recipeDAO.save(recipeDO);
        return mapper.mapToDTO(recipeDO, ServiceOperation.ADD);
    }

    @Override
    public void update(Integer id, Recipe recipeDTO) throws Exception {
        if (recipeDTO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        recipeDTO.setId(id);
        //validate DTO
        RecipeDO oldDo = recipeDAO.find(id);
        if (oldDo == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        RecipeDO toUpdateDO = mapper.mapToDO(recipeDTO, ServiceOperation.UPDATE);
        RecipeDO updatedDO = recipeDAO.merge(toUpdateDO);
        if (updatedDO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
    }

//    @Override
//    public void delete(Integer id) throws Exception {
//        if (id == null || id <= 0) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
//        if (recipeDAO.find(id) == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
//        recipeDAO.delete(id);
//    }

    private String getPluralizeJsonRootName(String rootName) {
        return rootName + "s";
    }

    private String constructJsonRoot(Class dtoClass) {
        String className = dtoClass.getSimpleName();
        return className.substring(0,1).toLowerCase() + className.substring(1);
    }
}
